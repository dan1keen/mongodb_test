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

Route::group(['namespace' => 'Api\v1',], function ()
{
    Route::get('/stations', 'GasStationController@index');
    Route::get('/station/{id}', 'GasStationController@edit');
    Route::post('/station/create', 'GasStationController@create');
    Route::post('/station/{id}/update', 'GasStationController@update');
    Route::delete('/station/{id}/delete', 'GasStationController@delete');
    Route::get('/stations/search', 'GasStationController@search');
});
