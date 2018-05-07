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
	//return view('disciplina.reg_disc');
});
Route::resource('administrador','AdministradorController');
Route::get('administrador/{id}/destroy',[ 
			'uses'=> 'AdministradorController@destroy',
			'as' => 'administrador.destroy']);

Route::resource('jugador','JugadorController');
Route::get('jugador/{id}/destroy',[ 
			'uses'=> 'JugadorController@destroy',
			'as' => 'jugador.destroy']);

Route::resource('disciplina','DisciplinaController');

Route::resource('club','ClubController');

Route::resource('gestion','GestionController');
