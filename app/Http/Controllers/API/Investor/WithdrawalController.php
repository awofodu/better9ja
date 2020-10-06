<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Jobs\ConfirmPayment;
use App\Maintenance;
use App\Merge;
use App\Referral;
use App\Report;
use App\Transaction;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Investment;
use Intervention\Image\Facades\Image;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        $withdrawals = Investment::whereUserId($user->id)->where('is_withdrawn',1)
            ->with('withdrawal_merges')->get();
        $referral_withdrawal = Referral::whereUserId($user->id)->where('is_withdrawn',1)
            ->with('ref_withdrawal_merges')->get();
//        foreach($all_referral_withdrawals as $withdrawal)
//        {
//            array_push($referral_withdrawal_id_array, $withdrawal->id);
//        }
//        $my_withdrawals = Merge::whereIn('withdrawal_id', $withdrawal_id_array)
//            ->with('withdrawal.investment','withdrawal.investor.user.guider','withdrawal.investor.user.referrer',
//                'withdrawal.investor.user.bank', 'user')->latest()->get();
//        $maintenances_withdrawal = Maintenance::whereIn('withdrawal_id',$withdrawal_id_array)
//            ->with('withdrawal.investment','withdrawal.maintenance_investor.user.bank','withdrawal.maintenance_investor.user.referrer',
//                'withdrawal.maintenance_investor.user.guider', 'user')->latest()->get();
//        $referral_withdrawal = Investment::whereIn('referral_withdrawal_id', $referral_withdrawal_id_array)
//            ->with('referral_withdrawal.investment','referral_withdrawal.investor.user.guider','referral_withdrawal.investor.user.referrer',
//                'referral_withdrawal.investor.user.bank', 'user')->latest()->get();
        $collection = collect($withdrawals);
        $merged = $collection->merge($referral_withdrawal);
        $withdrawals = $merged->paginate(6);
//
//        return response()->json(['user'=>$user, 'withdrawals'=> $withdrawals,
//            'maintenances_withdrawal'=>$maintenances_withdrawal]);
        return response()->json(['user'=>$user, 'withdrawals'=>$withdrawals]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Maintenance payment confirmation
        // Investor withdrawing confirms his investment payment from a maintenance payment\

        $merge = Merge::findOrFail($id);
        $maintenance = Maintenance::findOrFail($merge->maintenance_id);
        $user = User::findOrFail($maintenance->user_id)->first();
        $merge->is_paid = 1;

        if(file_exists(public_path('uploads/').$merge->proof_document))
        {
            @unlink(public_path('uploads/').$merge->proof_document);
        }

        $merge->save();
        $maintenance_merges = Merge::where('maintenance_id',$maintenance->id)->where('is_paid',1)->sum('amount');

        // the investor paying to the withdrawal now pays addition of 100% of previous payment from the 6th investment upward
        if($maintenance->amount == $maintenance_merges)
        {
            $user->minimum_investment = (int)$user->minimum_investment <= 250000 ? ((int)$user->minimum_investment * 2) : 500000;

//            if($user->minimum_investment > $user->maximum_investment)
//            {
//                $user->maximum_investment = $user->maximum_investment + 1500000;
//            }

            $user->save();

            $maintenance->is_paid = 1;

            $maintenance->save();
            Maintenance::create(['user_id'=>$maintenance->user_id, 'next_level'=>$maintenance->next_level+6]);
        }

        //Deduct the payed amount from the balance
        $withdrawal = $merge->withdrawal;
        $amount_received = $withdrawal->paid_amount;
        $withdrawal->paid_amount = (int)$amount_received + (int)$maintenance->amount;
        $withdrawal->balance = (int)$withdrawal->reward - (int)$withdrawal->paid_amount;
        $withdrawal->save();

        $maintenance->save();

        ConfirmPayment::dispatch($withdrawal, $maintenance)->delay(now()->addMinutes(1));

        Transaction::create(['user_id'=>$withdrawal->user->id, 'message'=>$user->name.' paid <span class="text-success">₦'.number_format($merge->amount).'</span> to you for Investment ID '.$withdrawal->investment_id]);

        $user->transactions()->create(
            ['message'=>'You paid <span class="text-success">₦'.number_format($merge->amount).'</span> out of <span class="text-success">₦'.number_format($maintenance->amount)."</span> for maintenance ID ".$maintenance->maintenance_id."."]);

        return response()->json('Confirmed', 200);
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
        // Investor withdrawing confirms his investment payment from an investment payment

        $merge = Merge::findOrFail($id);
        $investor = $merge->investor;
        $investor_investments = Investment::whereUserId($investor->user->id)->where('is_paid', 1)->get();
        $merge->is_paid = 1;

        if(file_exists(public_path('uploads/').$merge->proof_document))
        {
            @unlink(public_path('uploads/').$merge->proof_document);
        }

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
                $referrer->referral_earnings()->create([
                    'payer_id' => $investor->user->id,
                    'amount' => $investor_investments->count() < 1 ? (int)$amount * (5/100)  : (int)$amount * (2/100),
                    'percentage' => $investor_investments->count() < 1 ? '5%' : '2%',
                ]);
                $referral_bonus = Referral::whereUserId($referrer->id)->latest()->first();
                $referral_bonus->bonus = ($referral_bonus->bonus + $investor->user->referral_reward($request->amount));
                $referral_bonus->save();

                // Calculate maintenance charges
                if($referral_bonus->bonus > 4999)
                {
                    $maintenance = $referrer->maintenances()->latest()->first();
                    if((int)$maintenance->charge > 0)
                    {
                        $maintenance->charge = round(($maintenance->charge + (int)$amount) * (30/100));
                        $maintenance->save();
                    }else{
                        $maintenance->charge = round((int)$referral_bonus * (30/100));
                        $maintenance->save();
                    }
                }else{
                    $maintenance = $referrer->maintenances()->latest()->first();
                    $last_investment = Investment::whereUserId($referrer->id)->latest()->first();
                    $maintenance->charge = (int)$last_investment->amount * (10/100);
                    $maintenance->save();
                }
            }

            // Investors referrer's guider receives 1% bonus
            if($investor->user->referrer->guider)
            {
                $amount = $request->amount;
                $investor->user->referrer->guider->referral_earnings()->create([
                    'payer_id' => $investor->user->id,
                    'amount' => $investor->user->guider_reward($request->amount),
                    'percentage' => '2%',
                ]);
                $referral_bonus = Referral::whereUserId($investor->user->referrer->guider->id)->first();
                $referral_bonus->bonus = ($referral_bonus->bonus + $investor->user->guider_reward($request->amount));
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
                        $maintenance->charge = round((int)$referral_bonus * (30/100));
                        $maintenance->save();
                    }
                }else{
                    $maintenance = $investor->user->referrer->guider->maintenances()->latest()->first();
                    $last_investment = Investment::whereUserId($investor->user->referrer->guider->id)->latest()->first();
                    $maintenance->charge = (int)$last_investment->amount * (10/100);
                    $maintenance->save();
                }
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
            $investor->is_paid = 1;
            $investor->created_at = Carbon::now();
            $investor->save();
        }

        $investor->inv_paid_amount = (int)$investor->inv_paid_amount + (int)$merge->amount;
        $investor->save();

        $withdrawal = $merge->withdrawal;
        $amount_received = $withdrawal->paid_amount;
        $withdrawal->paid_amount = (int)$amount_received + (int)$merge->amount;
        $withdrawal->balance = (int)$withdrawal->reward - (int)$withdrawal->paid_amount;
        $withdrawal->save();

        ConfirmPayment::dispatch($withdrawal, $investor)->delay(now()->addMinutes(1));
        Transaction::create(['user_id'=>$merge->withdrawal->user->id, 'message'=>'You confirmed a payment of  <span class="text-success">₦'.number_format($merge->amount).'</span> from '.$investor->user->name.' for Investment ID '.$merge->withdrawal->investment_id]);

        $investor->user->transactions()->create(['message'=>'Your payment for Investment ID <span class="text-success">'.$merge->investor->investment_id."</span> has been confirmed by".$merge->withdrawal->user->name."."]);
        return response()->json(['user'=>$withdrawal]);

//        return response()->json('Payment Confirmed.');
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

    public function report(Request $request)
    {
        // Withdrawal report investor phone number

        $report = Report::create(['reporter_id'=>$request->reporter['id'],'reportee_id'=>$request->reportee['id'],
        'message'=>$request->message]);
        return response()->json($report);
    }

    public function merges($id)
    {
        //Collation of merges for withdrawal awaiting payment from an investor investment or maintenance fee

        $user = auth('api')->user();
        $withdrawal = Investment::findOrFail($id);
        $merges = Merge::whereWithdrawalId($withdrawal->id)
            ->with('investor.user.bank', 'investor.user.guider', 'investor.user.referrer', 'withdrawal',
            'maintenance_investor.user.bank', 'maintenance_investor.user.guider', 'maintenance_investor.user.referrer')
            ->paginate(6);
        return response()->json(['merges'=>$merges, 'user'=>$user]);
    }
}
