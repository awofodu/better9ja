<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Jobs\InvestmentSuccess;
use App\Jobs\InvUploadProofSuccess;
use App\Merge;
use App\Referral;
use App\Transaction;
use App\User;
use App\ReferralEarning;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        $user->bank;
        $investments = Investment::whereUserId($user->id)
            ->with('merges')->paginate(6);
        $investment_id_array = array();
        foreach($investments as $investment)
        {
            array_push($investment_id_array, $investment->id);
        }
        $all_investments = Investment::whereUserId($user->id)->get();
        $last_investment = Investment::whereUserId($user->id)->latest()->first();
        $maintenance = $user->maintenances()->latest()->first();
        $bonus = $user->referral->bonus;
        $merges = Merge::whereIn('investment_id',$investment_id_array)->get();
        $maintenance_merges = Merge::where('maintenance_id', $maintenance->id)->get();
        $sum_paid_merges = $merges->where('is_paid', 1)->sum('amount');
        return response()->json(['user'=>$user, 'investments'=> $investments,'maintenance'=>$maintenance,
        'all_investments' => $all_investments, 'bonus'=>$bonus, 'merges'=> $merges, 'paid_investment'=>$sum_paid_merges,
        'maintenance_merges'=>$maintenance_merges, 'last_investment'=>$last_investment]);
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
        $user = auth('api')->user();
        $investments = $user->investments;
        $investment = new Investment();
        if($request->amount >= $user->minimum_investment && $request->amount <= $user->maximum_investment)
        {
            $request->merge([
                'investment_id' => strtoupper(Str::random(5)),
                'reward' => $investment->reward((int)$request->amount),
                'inv_merge_balance' => (int)$request->amount,
            ]);


            if(!$request->proof_document)
            {
                $request->merge(['proof_document'=> '']);
            }

            $user->update(['minimum_investment' => $request->amount]);


            $investment = $user->investments()->create($request->all());

            $user->transactions()->create(
                ['message'=>'You invested <span class="text-success">₦'.number_format($request->amount)."</span> with ID ".$investment->investment_id." awaiting merging."]);

            InvestmentSuccess::dispatch($user, $investment)->delay(now()->addMinutes(1));


            return response()->json(['user'=>$user, 'investment'=>$investment]);
        }else{
            return response('Error',404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = auth('api')->user();
        $merge = Merge::findOrFail($id);
        $investments = Investment::whereUserId($user->id)->get();
        $proof_array = array();
        foreach($request->proof_document as $key => $proof)
        {
            $file = $proof['path'];
            $name = time().$key.'.'.explode('/', explode(':', substr($file, 0,
                    strpos($file, ';')))[1])[1];
            Image::make($file)->save(public_path('uploads/').$name);
            array_push($proof_array, $name);
        }
        $request->merge([
            'proof_document' => implode(',', $proof_array),
        ]);
        // Update the merge table
        $merge->update($request->all());
        $investment_merges = Merge::where('investment_id',$merge->investor->id)->where('is_paid',1)->sum('amount');

        if($merge->investor->amount == $investment_merges)
        {
            //If the investor has made more than one investment
            if($investments->count() > 1)
            {
                // Withrawal date = 7
                $request->merge(['withdrawal_date' => Carbon::now()->addDays(7)]);
            }else{
                // Withrawal date = 3
                $request->merge(['withdrawal_date' => Carbon::now()->addDays(3)]);
            }
            $request->merge(['created_at'=>Carbon::now()]);
            $merge->investor->update($request->all());
        }


//

        $withdrawal = $merge->withdrawal;

        InvUploadProofSuccess::dispatch($user, $withdrawal)->delay(now()->addMinutes(1));
        Transaction::create(['user_id'=>$merge->withdrawal->user->id, 'message'=>$user->name.' paid <span class="text-success">₦'.number_format($merge->amount).'</span> to you for Investment ID '.$merge->withdrawal->investment_id]);

        $user->transactions()->create(['message'=>'You paid for Investment ID <span class="text-success">'.$merge->investor->investment_id."</span>"]);
        return response()->json(['user'=>$withdrawal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth('api')->user();
        $investment = Investment::findOrFail($id);
        $investment->is_withdrawn = 1;
        $investment->withdraw()->create([
            'user_id'=>$user->id,
            ]);
//        $investment->save();
        return response($investment, 200);
    }
}
