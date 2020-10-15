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

Route::get('/clients/{id}/investments', 'clientsController@investments');
Route::get('clients/{id}/available-funds', 'clientsController@availableFunds');
Route::resource('clients', 'clientsController');

Route::resource('cash-flows', 'cashFlowsController');
Route::resource('funds', 'fundsController');
Route::resource('investments', 'investmentsController');
