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

Route::get('/', 'SiteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('demanda', 'DemandaController');
Route::resource('manejo', 'ManejoController');
Route::resource('variedade', 'VariedadeController');
Route::resource('cooperado', 'CooperadoController');
Route::resource('plantio', 'PlantioController');