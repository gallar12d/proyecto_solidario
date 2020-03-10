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
Route::get('/post_search_participante', 'HomeController@post_search_participante')->name('post_search_participante');
Route::post('/post_referir_participante', 'HomeController@post_referir_participante')->name('post_referir_participante');
Route::post('/participante_update_date', 'HomeController@participante_update_date')->name('participante_update_date');
Route::get('/participante_search_name', 'HomeController@participante_search_name')->name('participante_search_name');








