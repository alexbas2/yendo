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
    return redirect('login');
})->middleware('auth');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//viajes
Route::get('trip/crear','TripController@create')->name('trip.create')->middleware('auth');
Route::get('trip/{trip}','TripController@show')->name('trip.show')->middleware('auth');
Route::get('buscar','TripController@buscar')->name('buscar')->middleware('auth');

Route::get('ad/anuncio','AdController@anuncio')->name('trip.anuncio');
Route::get('solicitado/{trip}','TripController@solicitado')->name('trip.solicitado')->middleware('auth');

Route::get('finaliza/{id}','TripController@finaliza')->name('finaliza')->middleware('auth');

//peticiones
Route::post('/peticion/store','RequestController@store')->name('peticion.store')->middleware('auth');
Route::get('peticion/{id}/confirmar','RequestController@confirm')->name('peticion.confirm')->middleware('auth');


Route::post('/Ad/store','AdController@store')->name('Ad.store')->middleware('auth');

Route::post('/trip/store','TripController@store')->name('trip.store')->middleware('auth');
Route::get('misviajes','TripController@misViajes')->name('trip.misviajes')->middleware('auth');

//mensajes
Route::post('store','MessageController@store')->name('mensaje.store')->middleware('auth');

//ranking
Route::get('ranking','ScoreController@ranking')->name('ranking')->middleware('auth');

//Score
Route::get('traveler/{id}', 'TravelerController@index')->name('votar')->middleware('auth');
Route::get('score', 'ScoreController@store')->name('score.create')->middleware('auth');

Route::get('checking/{id}', 'TravelerController@checking')->name('trip.checking')->middleware('auth');


