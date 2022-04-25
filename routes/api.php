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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clientes', 'App\Http\Controllers\ClienteController@index');

Route::get('/cliente/final-placa/{numero}', 'App\Http\Controllers\ClienteController@findByplate');
Route::get('/cliente/{id}', 'App\Http\Controllers\ClienteController@findCliente');

Route::post('/cliente', 'App\Http\Controllers\ClienteController@store');
Route::put('/cliente/{id}', 'App\Http\Controllers\ClienteController@update');
Route::delete('/cliente/{id}', 'App\Http\Controllers\ClienteController@destroy');


