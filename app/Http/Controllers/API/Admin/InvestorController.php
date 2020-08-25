<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\AccountVerified;
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
        $users = User::with('guider','bank', 'referrer', 'referrals')->latest()->paginate(10);
        $banks = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get('https://api.paystack.co/bank')
            ->json();
        return response()->json(['users'=>$users, 'banks'=>$banks]);
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
