<?php

namespace App\Http\Controllers\Api\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Merge;
use App\Transaction;
use Illuminate\Http\Request;
use App\Maintenance;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MaintenanceController extends Controller
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
        $user = auth('api')->user();
        $maintenance = Maintenance::where('id',$request->id)->first();
        $maintenance->amount = $request->maintenance_fee;
        $maintenance->maintenance_id = strtoupper(Str::random(6));
        $maintenance->main_merge_balance = $request->maintenance_fee;
        $maintenance->save();

        $user->testimonies()->create(['body'=>$request->testimony]);
        return response()->json('Upgrading in progress.');
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
        if($request->merge['withdrawal'])
        {
            $user = auth('api')->user();
            $merge = Merge::findOrFail($id);
            $maintenance = Maintenance::findOrFail($merge->maintenance_id);
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

            $merge->update($request->all());
            $maintenance_merges = Merge::where('maintenance_id',$maintenance->id)->where('is_paid',1)->sum('amount');

            // the investor pays addition of 100% of previous payment from the 6th investment upward
            if($maintenance->amount == $maintenance_merges)
            {
                $user->minimum_investment = ((int)$user->minimum_investment * 2);

                if($user->minimum_investment > $user->maximum_investment)
                {
                    $user->maximum_investment = $user->maximum_investment + 1500000;
                }

                $user->save();
                Maintenance::create(['user_id'=>$user->id, 'maintenance_id'=>strtoupper(Str::random(6)),
                    'next_level'=>$maintenance->next_level+6]);

                $maintenance->update($request->all());
            }
//
            // Update the investment details of the investor withdrawing the money.
            $withdrawal = $merge->withdrawal;
            $amount_received = $withdrawal->paid_amount;
            $withdrawal->paid_amount = (int)$amount_received + (int)$merge->amount;
            $withdrawal->balance = (int)$withdrawal->reward - (int)$withdrawal->paid_amount;
            $withdrawal->save();
        }


        if($request->merge['referral_withdrawal'])
        {
            $user = auth('api')->user();
            $merge = Merge::findOrFail($id);
            $maintenance = Maintenance::findOrFail($merge->maintenance_id);
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

            $merge->update($request->all());
            $maintenance_merges = Merge::where('maintenance_id',$maintenance->id)->where('is_paid',1)->sum('amount');

            // the investor pays addition of 100% of previous payment from the 6th investment upward
            if($maintenance->amount == $maintenance_merges)
            {
                $user->minimum_investment = ((int)$user->minimum_investment * 2);

                if($user->minimum_investment > $user->maximum_investment)
                {
                    $user->maximum_investment = $user->maximum_investment + 1500000;
                }

                $user->save();
                Maintenance::create(['user_id'=>$user->id, 'maintenance_id'=>strtoupper(Str::random(6)),
                    'next_level'=>$maintenance->next_level+6]);

                $maintenance->update($request->all());
            }
//
            // Update the investment details of the investor withdrawing the money.
            $withdrawal = $merge->referral_withdrawal;
        }

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
        //
    }

    public function merges($id)
    {
        $user = auth('api')->user();
        $maintenance = Maintenance::findOrFail($id);
        $merges = Merge::whereMaintenanceId($maintenance->id)
            ->with('withdrawal.user.bank', 'withdrawal.user.guider', 'withdrawal',
            'referral_withdrawal.user.bank', 'referral_withdrawal.user.guider', 'referral_withdrawal')
            ->paginate(6);
        return response()->json(['merges'=>$merges, 'user'=>$user]);
    }
}
