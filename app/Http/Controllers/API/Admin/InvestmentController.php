<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Jobs\MergeSuccess;
use App\Merge;
use App\Referral;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\In;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments = Investment::with('user.referrals.referrer','user.bank',
            'merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank')
            ->latest()->paginate(10);
        return response()->json(['investments'=>$investments]);
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
        if($request->merge_amount > 0)
        {
            // Investors due for withdrawal
            $withdrawal = Referral::findOrFail($request->merge_id);
            $investment = Investment::findOrFail($request->investment['id']);

            $investment->inv_merge_balance = $investment->inv_merge_balance - $request->merge_amount;
            $investment->merges()->create(['referral_id'=>$withdrawal->id, 'amount'=>$request->merge_amount]);
            $paid_amount = Merge::where('referral_id',$withdrawal->id)->where('is_paid',1)->sum('amount');

            // Remove the amount the investor is about to pay from withdrawal reward
            $merge_balance = $withdrawal->merge_balance == 0 ? ((int)$withdrawal->amount - (int)$request->merge_amount)
                : ((int)$withdrawal->merge_balance - (int)$request->merge_amount);
            // Update the merge balance for the admin to know the remaining amount to settle the investor
            $withdrawal->merge_balance = $merge_balance;
            // Update the balance of the person withdrawing with his reward amount
            $withdrawal->balance = (int)$withdrawal->balance - $paid_amount; //add invested amount to the investment coln
            $withdrawal->save();
            $investment->save();

            MergeSuccess::dispatch($investment->user, $withdrawal->user)->delay(now()->addMinutes(1));

        }




//        $investment->referral_withdrawal_id = $withdrawal->id;

//
        $merges = Investment::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank','user.referrals.referrer',
                'user.bank')->paginate(5);
        $referrals = Referral::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('user')->paginate(5);
        return response()->json(['merges'=>$merges, 'referrals'=>$referrals]);
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
        if($request->merge_amount > 0)
        {
            $investment = Investment::findOrFail($id);

            $investment->inv_merge_balance = $investment->inv_merge_balance - $request->merge_amount;

            $withdrawal = Investment::findOrFail($request->merge_id);
            $investment->merges()->create(['withdrawal_id'=>$withdrawal->id, 'amount'=>$request->merge_amount]);

            // Remove the amount the investor is about to pay from withdrawal reward
            $merge_balance = $withdrawal->merge_balance == 0 ? ((int)$withdrawal->reward - (int)$request->merge_amount)
                : ((int)$withdrawal->merge_balance - (int)$request->merge_amount);
            // Update the merge balance for the admin to know the remaining amount to settle the investor
            $withdrawal->merge_balance = $merge_balance;
            // Update the balance of the person withdrawing with his reward amount
            $withdrawal->balance = (int)$withdrawal->reward - $withdrawal->paid_amount;

            $withdrawal->save();

            $investment->save();


            MergeSuccess::dispatch($investment->user, $withdrawal->user)->delay(now()->addMinutes(1));
        }


        $merges = Investment::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank','user.referrals.referrer',
                'user.bank')->paginate(5);
        return response()->json(['merges'=>$merges]);
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

    public function merges()
    {
        $merges = Investment::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank','user.referrals.referrer',
                'user.bank')->paginate(5);
        $referrals = Referral::where('is_withdrawn', 1)->with('user')->paginate(5);
        return response()->json(['merges'=>$merges, 'referrals'=>$referrals]);
    }

    public function resolveMerge(Request $request)
    {
        $merge = Merge::where('id', $request->merge['id'])->first();
        if($merge->investor)
        {
            // Revert price for the investor withdrawing
            $user = $merge->investor->user;
            $user->is_blocked = 0;
            $user->save();
        }


        if($request->maintenance_investor)
        {
            // Revert price for the investor withdrawing referral bonus
            $user = $merge->maintenance_investor->user;
            $user->is_blocked = 0;
            $user->save();
        }

        $merge->is_resolved = 1;
        $merge->save();
        return response()->json(['resolved']);
    }

    public function search()
    {
        if($search = \Request::get('q'))
        {
            $investments = Investment::where(function ($query) use ($search){
                $query->where('investment_id','LIKE',"%$search%");
            })->with('user.referrals.referrer','user.bank',
                'merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank')->latest('investments.created_at')->paginate(1000000);
            return response()->json(['investments'=>$investments]);
        }
    }
    
    public function createDummy(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        $investment = new Investment();
        $request->merge([
                'user_id'=>$user->id,
                'amount'=>$request->amount,
                'investment_id' => strtoupper(Str::random(5)),
                'is_paid' => 1,
                'is_withdrawn' => 1,
                'reward' => $investment->reward((int)$request->amount),
                'balance' => $investment->reward((int)$request->amount),
                'merge_balance' => $investment->reward((int)$request->amount),
                'withdrawal_date' => Carbon::now(),
        ]);
        Investment::create($request->all());
        return response()->json('Created');

    }
}
