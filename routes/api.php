<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;
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

Route::apiResource('offices', 'OfficeController')->only('index');
Route::post('/group/suggestion', 'GroupController@suggestion');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
