<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/contrato/{id?}', 'ContratoController@index');

Route::post('/contrato', 'ContratoController@criar');

Route::put('/contrato', 'ContratoController@editar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/certidao/{id?}', 'CertidaoController@index');

Route::post('/contrato', 'CertidaoController@criar');

Route::put('/contrato', 'CertidaoController@editar');

