<?php

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

Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
Route::get('/test', 'CartController@view');#->middleware('jwt.auth');

Route::group(['middleware' => ['web']], function() {
    Route::get('/cart/add', 'CartController@actionAdd');
    Route::get('/cart/delete', 'CartController@actionDelete');
    Route::get('cart/index', 'CartController@actionIndex');
    Route::get('cart/count', 'CartController@actionCount');
});


