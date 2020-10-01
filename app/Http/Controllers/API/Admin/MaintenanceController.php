<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Jobs\MergeSuccess;
use App\Maintenance;
use App\Merge;
use App\Referral;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = auth('api')->user();
        $maintenances = Maintenance::with('user.referrals.referrer','user.bank',
            'merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank', 'user.investments')
            ->latest()->paginate(50);
        return response()->json(['maintenances'=>$maintenances, 'admin'=>$admin]);
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
        // Investors due for withdrawal
        $withdrawal = Referral::findOrFail($request->merge_id);
        $maintenance = Maintenance::findOrFail($request->maintenance['id']);

        $maintenance->main_merge_balance = $maintenance->main_merge_balance - $request->merge_amount;
        $maintenance->merges()->create(['referral_id'=>$withdrawal->id, 'amount'=>$request->merge_amount]);
        $paid_amount = Merge::where('referral_id',$withdrawal->id)->where('is_paid',1)->sum('amount');

        // Remove the amount the investor is about to pay from withdrawal reward
        $merge_balance = $withdrawal->merge_balance == 0 ? ((int)$withdrawal->amount - (int)$request->merge_amount)
            : ((int)$withdrawal->merge_balance - (int)$request->merge_amount);
        // Update the merge balance for the admin to know the remaining amount to settle the investor
        $withdrawal->merge_balance = $merge_balance;
        // Update the balance of the person withdrawing with his reward amount
        $withdrawal->balance = (int)$withdrawal->balance - $paid_amount; //add invested amount to the investment coln
        $withdrawal->save();
        $maintenance->save();


        MergeSuccess::dispatch($maintenance->user, $withdrawal->user)->delay(now()->addMinutes(1));

        $merges = Investment::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank','user.referrals.referrer',
                'user.bank')->paginate(5);
        return response()->json(['merges'=>$merges]);//
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
        $maintenance = Maintenance::findOrFail($request->maintenance['id']);
        $maintenance->main_merge_balance = $maintenance->main_merge_balance - $request->merge_amount;

        $withdrawal = Investment::findOrFail($request->merge_id);
        $maintenance->merges()->create(['withdrawal_id'=>$withdrawal->id, 'amount'=>$request->merge_amount]);
        $paid_amount = Merge::where('withdrawal_id',$withdrawal->id)->where('is_paid',1)->sum('amount');

        // Remove the amount the investor is about to pay from withdrawal reward
        $merge_balance = $withdrawal->merge_balance == 0 ? (int)$withdrawal->reward - (int)$request->merge_amount
        : (int)$withdrawal->merge_balance - (int)$request->merge_amount;
        // Update the merge balance for the admin to know the remaining amount to settle the investor
        $withdrawal->merge_balance = $merge_balance;
        // Update the balance of the person withdrawing with his reward amount
        $withdrawal->balance = (int)$withdrawal->reward - $paid_amount;

        $withdrawal->save();
        $maintenance->save();


        MergeSuccess::dispatch($maintenance->user, $withdrawal->user)->delay(now()->addMinutes(1));

        $merges = Investment::where('is_withdrawn', 1)->where('merge_balance','!=', 0)
            ->with('merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank','user.referrals.referrer',
                'user.bank')->paginate(5);
        return response()->json(['merges'=>$merges]);//
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

    public function search()
    {
        if($search = \Request::get('q'))
        {
            $admin = auth('api')->user();
            $maintenances = Maintenance::select('maintenances.*')
                ->with('user.referrals.referrer','user.bank',
                    'merges.withdrawal.user.bank','merges.referral_withdrawal.user.bank')
                ->join('users', 'maintenances.user_id','=','users.id')
                ->where(function ($query) use ($search){
                    $query->where('maintenance_id','LIKE',"%$search%")->orWhere('users.email','LIKE',"%$search%")
                        ->orWhere('users.name','LIKE',"%$search%");
                })->latest('maintenances.created_at')->paginate(1000000);
            return response()->json(['maintenances'=>$maintenances, 'admin'=>$admin]);
        }
    }
}
