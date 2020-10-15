<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Maintenance;
use App\Merge;
use App\Referral;
use App\ReferralEarning;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        $user->guider;
        $investments = $user->investments->where('withdrawal_date', '>', Carbon::now())->count();
        $referrals = User::whereReferredBy($user->referral_id)->with('guider', 'referrer')->paginate(20);
//        $bonus = ReferralEarning::whereUserId($user->id)->sum('amount');
        $bonus = Referral::whereUserId($user->id)->latest()->first();
        $earnings = $user->referral_earnings()->with('user','payer')->paginate(20);
        $user = $user->load('guider', 'referrer', 'referral_earnings.user');
        return response()->json(['user'=>$user, 'referrals'=>$referrals, 'bonus'=>$bonus, 'earnings'=>$earnings,
        'investments'=>$investments]);
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
        if($request->merge['investor'])
        {
            $merge = Merge::findOrFail($request->merge['id']);
            $investor = $merge->investor;
            $investor_investments = Investment::whereUserId($investor->user_id)->where('is_paid', 1)->get();
            $merge->is_paid = 1;

            $merge->save();

            // If the investor has a referrer
            if($investor->user->referrer)
            {
                // If it is investor first investment
                if((int)$investor->user->is_activated === 1)
                {
                    $amount = $request->amount;

                    // Referral receives a 5% bonus pay
                    $referrer = User::whereReferralId($investor->user->referrer->referral_id)->first();
                    $ref_amount = $investor_investments->count() < 1 ? round((int)$amount * (5/100))  : round((int)$amount * (2/100));
                    $referrer->referral_earnings()->create([
                        'payer_id' => $investor->user->id,
                        'amount' => $ref_amount,
                        'percentage' => $investor_investments->count() < 1 ? '5%' : '2%',
                    ]);
                    $referral_bonus = Referral::whereUserId($referrer->id)->first();
                    $referral_bonus->bonus = round($referral_bonus->bonus + $ref_amount);
                    $referral_bonus->save();

                    // Calculate maintenance charge
                    if($referral_bonus->bonus > 4999)
                    {
                        $maintenance = $referrer->maintenances()->latest()->first();
                        if((int)$maintenance->charge > 0)
                        {
                            $maintenance->charge = round(($maintenance->charge + (int)$amount) * (30/100));
                            $maintenance->save();
                        }else{
                            $maintenance->charge = round((int)$referral_bonus->bonus * (30/100));
                            $maintenance->save();
                        }
                    }else{
                        $maintenance = $referrer->maintenances()->latest()->first();
                        $last_investment = Investment::whereUserId($referrer->id)->latest()->first();
                        $maintenance->charge = round((int)$last_investment->amount * (10/100));
                        $maintenance->save();
                    }

                }

                // Investors referrer's guider receives 1% bonus
                if($investor->user->referrer->guider)
                {
                    $amount = $request->amount;
                    $investor->user->referrer->guider->referral_earnings()->create([
                        'payer_id' => $investor->user->id,
                        'amount' => round((int)$request->amount * (2/100)),
                        'percentage' => '2%',
                    ]);
                    $referral_bonus = Referral::whereUserId($investor->user->referrer->guider->id)->first();
                    $referral_bonus->bonus = round($referral_bonus->bonus + ((int)$request->amount * (2/100)));
                    $referral_bonus->save();

                    // Calculate maintenance charge
                    if($referral_bonus->bonus > 4999)
                    {
                        $maintenance = $investor->user->referrer->guider->maintenances()->latest()->first();
                        if((int)$maintenance->charge > 0)
                        {
                            $maintenance->charge = round(($maintenance->charge + (int)$amount) * (30/100));
                            $maintenance->save();
                        }else{
                            $maintenance->charge = round((int)$referral_bonus->bonus * (30/100));
                            $maintenance->save();
                        }
                    }else{
                        $maintenance = $investor->user->referrer->guider->maintenances()->latest()->first();
                        $last_investment = Investment::whereUserId($investor->user->referrer->guider->id)->latest()->first();
                        $maintenance->charge = round((int)$last_investment->amount * (10/100));
                        $maintenance->save();
                    }
                }
            }

            $investment_merges = Merge::where('investment_id',$investor->id)->where('is_paid',1)->sum('amount');

            if($merge->investor->amount == $investment_merges)
            {
                //If the investor has made more than one investment
                if($investor_investments->count() >= 1)
                {
                    // Withrawal date = 7
                    $investor->withdrawal_date = Carbon::now()->addDays(7);
                }else{
                    // Withrawal date = 3
                    $investor->withdrawal_date = Carbon::now()->addDays(3);
                }
                $investor->created_at = Carbon::now();
                $investor->is_paid = 1;
                $investor->save();
            }

            $investor->inv_paid_amount = round((int)$investor->inv_paid_amount + (int)$merge->amount);
            $investor->save();

            $withdrawal = $merge->referral_withdrawal;
            $amount_received = round($withdrawal->paid_amount);
            $withdrawal->paid_amount = round((int)$amount_received + (int)$merge->amount);
            $withdrawal->balance = round((int)$withdrawal->amount - (int)$withdrawal->paid_amount);
            if($withdrawal->balance == 0)
            {
                $withdrawal->is_withdrawn = 0;
            }
            $withdrawal->save();
            $investor->user->transactions()->create(['message'=>'You paid for Investment ID <span class="text-success">'.$merge->investor->investment_id."</span>"]);
        }

        if($request->merge['maintenance_investor'])
        {
            $merge = Merge::findOrFail($request->merge['id']);
            $investor = $merge->maintenance_investor;
            $maintenance = Maintenance::findOrFail($merge->maintenance_id);
            $merge->is_paid = 1;

            $merge->save();
            $maintenance_merges = Merge::where('maintenance_id',$maintenance->id)->where('is_paid',1)->sum('amount');

            // the investor paying to the withdrawal now pays addition of 100% of previous payment from the 6th investment upward
            if($maintenance->amount == $maintenance_merges)
            {
                $investor->user->minimum_investment = (int)$investor->user->minimum_investment <= 250000 ? round((int)$investor->user->minimum_investment * 2) : 500000;

//                if($investor->user->minimum_investment > $investor->user->maximum_investment)
//                {
//                    $investor->user->maximum_investment = $investor->user->maximum_investment + 1500000;
//                }

                $investor->user->save();
                Maintenance::create(['user_id'=>$investor->user->id, 'next_level'=>$maintenance->next_level+6]);

                $maintenance->is_paid = 1;
                $maintenance->save();
            }

            //Deduct the payed amount from the balance
            $withdrawal = $merge->referral_withdrawal;
            $amount_received = round($withdrawal->paid_amount);
            $withdrawal->paid_amount = round((int)$amount_received + (int)$merge->amount);
            $withdrawal->balance = round((int)$withdrawal->amount - (int)$withdrawal->paid_amount);
            if($withdrawal->balance == 0)
            {
                $withdrawal->is_withdrawn = 0;
            }
            $withdrawal->save();
            $investor->user->transactions()->create(['message'=>'You paid for Maintenance ID <span class="text-success">'.$merge->maintenance_investor->maintenance_id."</span>"]);
        }

        Transaction::create(['user_id'=>$merge->referral_withdrawal->user->id, 'message'=>$investor->user->name.' paid <span class="text-success">₦'.number_format($merge->amount).'</span> to you for Referral ID '.$merge->referral_withdrawal->referral_id]);

        return response()->json('Confirmed', 200);
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
        $referral = Referral::where('id', $id)->first();
        $maintenance = $user->maintenances()->latest()->first();
        if($referral->bonus >= 5000 && $referral->amount == 0)
        {
            $referral->amount = $referral->amount + $referral->bonus;
//            $referral->bonus = $referral->bonus - $request->price;
            $referral->is_withdrawn = 1;
            $referral->merge_balance = $referral->bonus;
            $referral->balance = $referral->merge_balance;
            $referral->referral_id = strtoupper(Str::random(6));
            $referral->save();

            $maintenance->pending_amount = $maintenance->pending_amount + round((int)$referral->amount * (30/100));
            $maintenance->save();

            Referral::create(['user_id'=>$user->id, 'referral_id'=>strtoupper(Str::random(6))]);
        }
        return response()->json('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function merges($id)
    {
        $user = auth('api')->user();
        $withdrawal = Referral::findOrFail($id);
        $merges = Merge::whereReferralId($withdrawal->id)
            ->with('investor.user.bank', 'investor.user.guider', 'investor.user.referrer', 'referral_withdrawal',
                'maintenance_investor.user.bank', 'maintenance_investor.user.guider', 'maintenance_investor.user.referrer')
            ->paginate(6);
        return response()->json(['merges'=>$merges, 'user'=>$user]);
    }
}
