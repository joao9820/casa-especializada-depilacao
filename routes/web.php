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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/nossa-historia', function () {
    return view('aboutUs');
});

Route::get('/contato', 'MeetUsController@index')->name('contato');

Route::get('/servicos', 'ServiceGroupController@index')->name('grupo-servicos');
Route::get('/servicos/{id}', 'ServiceGroupController@show')->name('info-servico');
Route::get('/promocoes/{id}', 'PromotionController@show')->name('info-promocao');
Route::post('/enviar-email', 'SendEmailController@store')->name('enviar-email');


