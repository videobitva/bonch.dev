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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['middleware' => ['web']], function() {
    Route::get('/cart/add', 'CartController@add');
    Route::get('/cart/delete', 'CartController@actionDelete');
    Route::get('cart/index', 'CartController@actionIndex');
    Route::get('cart/count', 'CartController@actionCount');
    Route::get('/cart/show', 'CartController@show_me');
});

Route::get('/plate/genre/{genre}','PlateController@sortGenre');
Route::get('/plate/country/{country}','PlateController@sortCountry');
Route::get('/plate/catalog','PlateController@sortCatalog');
Route::get('/plate/label/{label}','PlateController@sortLabel');
Route::get('/plate/year/issue/{year_iss}','PlateController@yearIssue');
Route::get('/plate/year/publishing/{year_pub}','PlateController@yearPublishing');
Route::get('/plate/card/{id}','PlateController@cardPlate');






