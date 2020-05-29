<?php

use Illuminate\Http\Request;

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

Route::post('login','RestController@login');
Route::get('seat','RestController@getseat');
Route::post('ceckstate','RestController@checkseat');
Route::get('getProduct','RestController@demo');
Route::post('saveOrder','RestController@saveOrder');
Route::post('tableLock','RestController@tableLock');
Route::post('getSortProduct','RestController@getProduct');
Route::post('TableProduct','RestController@TableProduct');
Route::post('updateOrder','RestController@updateOrder');
Route::post('finishOrder','RestController@finishOrder');
Route::post('RunningTable','RestController@RunningTable');
Route::post('cancelItem','RestController@cancelItem');
Route::post('changeItem','RestController@changeItem');
Route::post('addContect','RestController@addContect');


Route::post('freeTable','RestController@freeTable');


Route::get('category','RestController@category');