<?php

use App\Investment;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/how-it-works', function () {
    return view('about-us');
})->name('how-it-works');

Route::get('/update', function (){
    $users = User::all();
    foreach($users as $user)
    {
        $ref = \App\Referral::where('user_id', $user->id)->latest()->first();
        $prev_ref =  \App\Referral::where('user_id', $user->id)->latest()->skip(1)->first();
        $ref_count = \App\Referral::where('user_id', $user->id)->count();
        if($ref_count > 1)
        {
            if($ref->bonus > 4999)
            {
                $maintenance = $user->maintenances()->latest()->first();
                $maintenance->charge = round((int)$ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                $maintenance->save();
            }else{
                $maintenance = $user->maintenances()->latest()->first();
                $maintenance->charge = round((int)$prev_ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                $maintenance->save();
            }

        }else{
            if($ref->bonus > 4999)
            {
                $maintenance = $user->maintenances()->latest()->first();
                $maintenance->charge = round((int)$ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                $maintenance->save();
            }else{
                $last_investment = Investment::whereUserId($user->id)->latest()->first();
                $maintenance = $user->maintenances()->latest()->first();
                $maintenance->charge = $last_investment ? round((int)$last_investment->amount * (10/100)) + round((int)$maintenance->pending_amount * (30/100)) : 0;
                $maintenance->save();
            }

        }

        echo 'done';
    }
});

Route::get('/rw', function(){
  $referrals = \App\Referral::where('bonus','>', 0)->where('is_withdrawn', 0)->whereNotIn('user_id', [6,15,28,52,80,81,112,194])->get();
  $w_referrals = \App\Referral::where('bonus','>', 0)->where('is_withdrawn', 1)->get();
  foreach($referrals as $referral)
  {
     $earnings = \App\ReferralEarning::where('user_id', $referral->user_id)->get();
     $amount = \App\ReferralEarning::where('user_id', $referral->user_id)->sum('amount');
//     foreach($earnings as $earning)
//     {
//         if($referral->user_id == $earning->user_id)
//         {
      if($referral->bonus != $amount)
      {
          $referral->bonus = $amount;
          $referral->save();
          echo 'unwithdrawn='.$referral->user_id.'='.$referral->bonus. '=' . $amount.'<br>';
      }
//         }
//     }
  }
  foreach($w_referrals as $referral)
  {
     $earnings = \App\ReferralEarning::where('user_id', $referral->user_id)->get();
     $amount = \App\ReferralEarning::where('user_id', $referral->user_id)->sum('amount');
//     foreach($earnings as $earning)
//     {
//         if($referral->user_id == $earning->user_id)
//         {
             echo 'withdrawn='.$referral->user_id.'='.$referral->bonus. '=' . $amount.'<br>';
//         }
//     }
  }
});

Route::post('/contact/send', 'InvestorController@store');

Auth::routes(['verify' => true]);

Route::get('/register/{referral_link}', 'Auth\RegisterController@referrer');

Route::get('/activate-account', function(){
    return view('activate');
})->middleware(['auth','activated','verified']);



// Checking admin account.... Private route known only to the admin
Route::get('/user_login/{id}' , function($id){
    $user = Auth::loginUsingId($id);
    return redirect('/investments');
});

Route::get('/admin/{path}', 'AdminController@index')->where('path',  '.*')->middleware(['auth', 'admin', 'verified']);
Route::get('/{path}', 'InvestorController@index')->where('path',  '.*')->middleware(['auth', 'active_investor', 'verified']);

