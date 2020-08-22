<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Merge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecommitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = auth('api')->user();
        $investment = Investment::whereId($id)->latest()->first();
        $user->bank;
        $investments = Investment::whereUserId($user->id)
            ->with('merges')->paginate(6);
        $investment_id_array = array();
        foreach($investments as $investment)
        {
            array_push($investment_id_array, $investment->id);
        }
        $all_investments = Investment::whereUserId($user->id)->get();
        $maintenance = $user->maintenances()->latest()->first();
        $bonus = $user->referral->bonus;
        $merges = Merge::whereIn('investment_id',$investment_id_array)->get();
        $maintenance_merges = Merge::where('maintenance_id', $maintenance->id)->get();
        $sum_paid_merges = $merges->where('is_paid', 1)->sum('amount');
        return response()->json(['user'=>$user, 'investments'=> $investments,'maintenance'=>$maintenance,
            'all_investments' => $all_investments, 'bonus'=>$bonus, 'merges'=> $merges, 'paid_investment'=>$sum_paid_merges,
            'maintenance_merges'=>$maintenance_merges, 'investment'=> $investment]);
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
        $investments = $user->investments;
        $investment = Investment::findOrFail($id);
        $new_investment = new Investment();
        if($request->amount >= $investment->amount && $request->amount <= $user->maximum_investment)
        {
            $request->merge([
                'investment_id' => strtoupper(Str::random(5)),
                'reward' => $new_investment->reward((int)$request->amount),
                'inv_merge_balance' => (int)$request->amount,
            ]);



            $user->update(['minimum_investment' => $request->amount]);


            $investment->is_withdrawn = 1;
            $investment->balance = $investment->reward;
            $investment->merge_balance = $investment->reward;
            $investment->save();

            $user->transactions()->create(
                ['message'=>'You withdrew <span class="text-success">₦'.number_format($investment->reward)."</span> with ID".$investment->investment_id." awaiting for merging."]);

            $investment = $user->investments()->create($request->all());

            $user->transactions()->create(
                ['message'=>'You invested <span class="text-success">₦'.number_format($request->amount)."</span> with ID".$investment->investment_id." awaiting for merging."]);

            return response('Success', 200);
        }else{
            return response('Error',404);
        }
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
