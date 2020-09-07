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
        $referrals = User::whereReferredBy($user->referral_id)->with('guider', 'referrer')->paginate(1);
//        $bonus = ReferralEarning::whereUserId($user->id)->sum('amount');
        $bonus = Referral::whereUserId($user->id)->first();
        $earnings = $user->referral_earnings()->with('user')->paginate(3);
        $user = $user->with('guider', 'referrer', 'referral_earnings.user')->first();
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
            $investor_investments = Investment::whereUserId($investor->user_id)->get();
            $merge->is_paid = 1;

            $merge->save();

            // If the investor has a referrer
            if($investor->user->referrer)
            {
                // If it is investor first investment
                if($investor_investments->count() == 1 && (int)$investor->user->is_activated === 1)
                {
                    // Referral receives a 5% bonus pay
                    $referrer = User::whereReferralId($investor->user->referrer->referral_id)->first();
                    $referrer->referral_earnings()->create([
                        'amount' => $investor->user->referral_reward($request->amount),
                        'percentage' => $referrer->referral_earnings->count() < 1 ? '5%' : '2%',
                    ]);
                    $referral_bonus = Referral::whereUserId($referrer->id)->first();
                    $referral_bonus->bonus = ($referral_bonus->bonus + $investor->user->referral_reward($request->amount));
                    $referral_bonus->save();
                }

                // Investors referrer's guider receives 1% bonus
                if($investor->user->referrer->guider)
                {
                    $investor->user->referrer->guider->referral_earnings()->create([
                        'amount' => $investor->user->guider_reward($request->amount),
                        'percentage' => '2%',
                    ]);
                    $referral_bonus = Referral::whereUserId($investor->user->referrer->guider->id)->first();
                    $referral_bonus->bonus = ($referral_bonus->bonus + $investor->user->guider_reward($request->amount));
                    $referral_bonus->save();
                }
            }

            $investment_merges = Merge::where('investment_id',$investor->id)->where('is_paid',1)->sum('amount');

            if($merge->investor->amount == $investment_merges)
            {
                //If the investor has made more than one investment
                if($investor_investments->count() > 1)
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

            $investor->inv_paid_amount = (int)$investor->inv_paid_amount + (int)$merge->amount;
            $investor->save();

            $withdrawal = $merge->referral_withdrawal;
            $amount_received = $withdrawal->paid_amount;
            $withdrawal->paid_amount = (int)$amount_received + (int)$merge->amount;
            $withdrawal->balance = (int)$withdrawal->amount - (int)$withdrawal->paid_amount;
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
                $investor->user->minimum_investment = ((int)$investor->user->minimum_investment * 2);

                if($investor->user->minimum_investment > $investor->user->maximum_investment)
                {
                    $investor->user->maximum_investment = $investor->user->maximum_investment + 1500000;
                }

                $investor->user->save();
                Maintenance::create(['user_id'=>$investor->user->id, 'next_level'=>$maintenance->next_level+6]);

                $maintenance->is_paid = 1;
                $maintenance->save();
            }

            //Deduct the payed amount from the balance
            $withdrawal = $merge->referral_withdrawal;
            $amount_received = $withdrawal->paid_amount;
            $withdrawal->paid_amount = (int)$amount_received + (int)$merge->amount;
            $withdrawal->balance = (int)$withdrawal->amount - (int)$withdrawal->paid_amount;
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
        $referral = Referral::whereUserId($user->id)->first();
        $referral->amount = $referral->amount + $referral->bonus;
        $referral->bonus = $referral->bonus - $request->price;
        $referral->is_withdrawn = 1;
        $referral->merge_balance = $referral->amount;
        $referral->balance = $referral->amount;
        $referral->referral_id = strtoupper(Str::random(6));
        $referral->save();
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
