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

Route::get('/', function () {
    return redirect()->route('unidades_saude.index');
});

Route::resource('procedimentos', 'ProcedimentoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('unidades_saude', 'UnidadeSaudeController')->parameters(['unidades_saude' => 'unidade_saude']);

Route::resource('fpos', 'FpoController');
