<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:api']], function(){
    Route::get('investor/profile/activate', 'API\Investor\ProfileController@getUser');
    Route::post('investor/profile/activate', 'API\Investor\ProfileController@activate_account');
});


Route::group(['middleware'=>['auth:api','active_investor']], function(){
    Route::get('investor/withdrawal/merges/{id}', 'API\Investor\WithdrawalController@merges');
    Route::apiResources(['investor/investments' => 'API\Investor\InvestmentController']);
    Route::apiResources(['investor/investment/merges' => 'API\Investor\MergeController']);
    Route::apiResources(['investor/maintenance' => 'API\Investor\MaintenanceController']);
    Route::get('investor/maintenance/merges/{id}', 'API\Investor\MaintenanceController@merges');
    Route::apiResources(['investor/withdrawals' => 'API\Investor\WithdrawalController']);
    Route::post('investor/report', 'API\Investor\WithdrawalController@report');
    Route::apiResources(['investor/recommit' => 'API\Investor\RecommitController']);
    Route::apiResources(['investor/profile' => 'API\Investor\ProfileController']);
    Route::post('investor/profile/change-password', 'API\Investor\ProfileController@changePassword');
    Route::apiResources(['investor/referrals' => 'API\Investor\ReferralController']);
    Route::get('investor/referral/merges/{id}', 'API\Investor\ReferralController@merges');
    Route::apiResources(['investor/transactions' => 'API\Investor\TransactionController']);
    Route::apiResources(['investor/testimonies' => 'API\Investor\TestimonyController']);
    Route::apiResources(['investor/dashboard' => 'API\Investor\DashboardController']);
});


Route::group(['middleware'=>['auth:api','admin']], function(){
    Route::apiResources(['admin/dashboard' => 'API\Admin\DashboardController']);
    Route::apiResources(['admin/investors' => 'API\Admin\InvestorController']);
    Route::get('admin/investor/search', 'API\Admin\InvestorController@search');
    Route::apiResources(['admin/investments' => 'API\Admin\InvestmentController']);
    Route::get('admin/investment/search', 'API\Admin\InvestmentController@search');
    Route::get('admin/maintenances/search', 'API\Admin\MaintenanceController@search');
    Route::post('admin/investment/create-dummy', 'API\Admin\InvestmentController@createDummy');
    Route::apiResources(['admin/maintenances' => 'API\Admin\MaintenanceController']);
    Route::get('admin/merges', 'API\Admin\InvestmentController@merges');
    Route::post('admin/resolve-merges', 'API\Admin\InvestmentController@resolveMerge');
    Route::apiResources(['admin/withdrawals' => 'API\Admin\WithdrawalController']);
    Route::apiResources(['admin/manage-admin' => 'API\Admin\ManageController']);
    Route::apiResources(['admin/reports' => 'API\Admin\MessageController']);
    Route::get('admin/report/messages', 'API\Admin\MessageController@messages');
    Route::delete('admin/report/messages/{id}', 'API\Admin\MessageController@deleteMessage');
    Route::apiResources(['admin/testimonies' => 'API\Admin\TestimonyController']);
});
