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

//Route::group(['middleware' => ['sessions']], function () {
    Route::apiResource('manejo', 'ManejoController');    
    Route::apiResource('endereco', 'EnderecoController');
    Route::apiResource('plantio', 'PlantioController');
    Route::apiResource('venda', 'VendaController');
    Route::apiResource('demanda', 'DemandaController');
    Route::apiResource('variedade', 'VariedadeController');
    Route::apiResource('extrato', 'ExtratoController');
    Route::post('plantio/manejo', 'PlantioController@manejo')->name('plantio.manejo');
    Route::get('saldo', 'ExtratoController@saldo')->name('saldo');
//});
