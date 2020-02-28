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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/participantes', 'HomeController@participantes')->name('participantes');

Route::get('/participantes_create', 'HomeController@participantesCreate')->name('participantes_create');
Route::post('/participante_crear', 'HomeController@postParticipantesCreate')->name('participante_crear');
Route::get('/participante_search', 'HomeController@participante_search')->name('participante_search');


