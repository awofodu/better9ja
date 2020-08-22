<?php

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

Route::post('/contact/send', 'InvestorController@store');

Auth::routes(['verify' => true]);

Route::get('/register/{referral_link}', 'Auth\RegisterController@referrer');

Route::get('/activate-account', function(){
    return view('activate');
})->middleware(['auth','activated','verified']);

Route::get('/admin/{path}', 'AdminController@index')->where('path',  '.*')->middleware(['auth', 'admin', 'verified']);
Route::get('/{path}', 'InvestorController@index')->where('path',  '.*')->middleware(['auth', 'active_investor', 'verified']);

