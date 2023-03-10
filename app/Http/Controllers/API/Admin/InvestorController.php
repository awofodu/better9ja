<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Jobs\AccountVerified;
use App\Maintenance;
use App\Merge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth('api')->user();
        $users = User::with('guider','bank', 'referrer', 'referrals')->latest()->paginate(25);
        $banks = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get('https://api.paystack.co/bank')
            ->json();
        return response()->json(['users'=>$users, 'banks'=>$banks, 'admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        get list of banks at https://api.paystack.co/bank
        $banks = User::bank_api($request->account_number, $request->bank_code);
        return response($banks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->is_activated = 1;
        $user->save();

        @unlink(public_path('uploads/').$user->proof_document);

        $referrer_referrals = User::where('referred_by', $user->referred_by)->where('is_activated', 1)->count();
        //if the investor
        if($referrer_referrals == 15)
        {
            User::where('referral_id', $user->referred_by)->update(['is_guider'=>1]);
        }

        $admin = auth('api')->user();

        AccountVerified::dispatch($user, $admin)->delay(now()->addMinutes(1));
        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banks = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get('https://api.paystack.co/bank')
            ->json();
        $bank = collect($banks['data']);
        $bank_name = $bank->where('code', $request->bank_code)->first()['name'];
        $request->merge(['bank_name' => $bank_name]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->bank()->where('user_id',$user->id)->first()->update([
            'bank_name' => $request->bank_name,
            'bank_code' => $request->bank_code,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
        ]);
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $investment = Investment::whereUserId($user->id)->where('is_paid', 0)->first();
        $maintenance = Maintenance::whereUserId($user->id)->where('is_paid', 0)->first();
        if($investment)
        {
            $merges = Merge::where('investment_id', $investment->id)->where('is_terminated',1)->get();
        }else{
            $merges = Merge::where('maintenance_id', $maintenance->id)->where('is_terminated',1)->get();
        }

        if($merges)
        {
            foreach($merges as $merge)
            {
                $merge->is_resolved = 1;
                $merge->save();
            }
        }


        if($user->is_blocked == 0)
        {
            $user->is_blocked = 1;
        }else{
            $user->is_blocked = 0;
        }
        $user->save();
        return response()->json('suspended', 200);
    }

    public function search()
    {
        if($search = \Request::get('q'))
        {
            $users = User::where(function ($query) use ($search){
                $query->where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%");
            })->with('guider','bank', 'referrer', 'referrals')->latest('users.created_at')->paginate(1000000);

            $banks = Http::withHeaders([
                'accept' => 'application/json'
            ])
                ->get('https://api.paystack.co/bank')
                ->json();
            return response()->json(['users'=>$users, 'banks'=>$banks]);
        }
    }
}
