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

Route::get('/contato', function () {
    return view('meetUs');
});

Route::get('/servicos', 'ServiceController@index')->name('servicos');

Route::get('/servicos/{id}', function () {
    return view('serviceInfo');
});
