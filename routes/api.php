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

Route::get('/product','ShopController@index');
Route::resource('/cart', 'CartController');


Route::resource('/placeorder','OrderController');
Route::get('/order/all','OrderController@index');
Route::get('/order/detail/{id}','OrderController@show');
Route::put('/order/proses/{id}','OrderController@update');
Route::post('/history','HistoryController@index');

