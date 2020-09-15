<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Maintenance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        $user->investments;
        $withdrawals = $user->investments->where('is_withdrawn', 1)->count();
        $referrals = $user->referrals->count();
        $inv_amount = $user->investments->where('is_paid', 1)->sum('amount');
        $with_amount = $user->investments->where('is_withdrawn', 1)->sum('amount');
        $maintenance = Maintenance::whereUserId($user->id)->where('is_paid', 1)->latest()->first();
        return response()->json(['user'=>$user, 'investment_amount'=>$inv_amount, 'withdrawal_amount'=>$with_amount,
        'withdrawals'=>$withdrawals, 'referrals'=>$referrals, 'maintenance'=>$maintenance]);
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
        //
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
}
