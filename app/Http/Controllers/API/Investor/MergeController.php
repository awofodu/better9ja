<?php

namespace App\Http\Controllers\API\Investor;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Merge;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MergeController extends Controller
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
        $investment = Investment::findOrFail($id);
        $merges = Merge::whereInvestmentId($investment->id)
            ->with('withdrawal.user.bank', 'withdrawal.user.guider', 'withdrawal',
                'referral_withdrawal.user.bank', 'referral_withdrawal.user.guider', 'referral_withdrawal')->paginate(6);
        return response()->json(['merges'=>$merges, 'user'=>$user]);
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

        if($merge->investor->reward == $investment_merges)
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

        $withdrawal = $merge->referral_withdrawal;
        Transaction::create(['user_id'=>$merge->referral_withdrawal->user->id, 'message'=>$user->name.' paid <span class="text-success">₦'.number_format($merge->amount).'</span> to you for Referral ID '.$merge->referral_withdrawal->referral_id]);

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
        //
    }
}
