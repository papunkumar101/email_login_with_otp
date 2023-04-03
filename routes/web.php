<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCtrl;

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
});


Route::get('login',[UserCtrl::class,'login_view']);
Route::post('send_otp',[UserCtrl::class,'otp_send']);
Route::post('resend-otp',[UserCtrl::class,'resend_otp']);
Route::post('submit-form',[UserCtrl::class,'login']);