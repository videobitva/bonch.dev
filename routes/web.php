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

    Route::get('/cart/add', 'CartController@actionAdd');
    Route::get('/cart/delete', 'CartController@actionDelete');
    Route::get('/cart/count', 'CartController@actionCount');
    Route::get('/cart/show', 'CartController@actionShow');

});

Route::group(['middleware' => ['web', 'auth', 'verified']], function (){
    Route::get('/user/get_favourite', 'UserController@getFavourite');
    Route::get('/user/add_favourite', 'UserController@addFavourite');
    Route::get('/user/remove_favourite', 'UserController@removeFavourite');

    Route::get('/user/get_id','UserController@getUserID');
    Route::get('/user/get_user_info','UserController@getUserInfo');

    Route::get('/order/make', 'OrderController@order');
    Route::get('/order/index', 'OrderController@index');
    Route::get('/order/total', 'OrderController@total');
});

Route::get('/plate/genre/','PlateController@sortGenre');
Route::get('/plate/country/','PlateController@sortCountry');
Route::get('/plate/catalog/','PlateController@sortCatalog');
Route::get('/plate/label/','PlateController@sortLabel');
Route::get('/plate/year/issue/','PlateController@yearIssue');
Route::get('/plate/year/publishing/','PlateController@yearPublishing');
Route::get('/plate/card/','PlateController@cardPlate');

Route::get('/plate/new/','PlateController@newPlate');
Route::get('/plate/best/','PlateController@bestellerPlate');
Route::get('/plate/pre/','PlateController@preordersPlate');
Route::get('/plate/select/genre1','PlateController@selectionGenre1Catalog');
Route::get('/plate/select/genre2','PlateController@selectionGenre2Catalog');
Route::get('/plate/select/year','PlateController@selectionYearCatalog');





