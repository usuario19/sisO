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
route::get('club/{id}/destroy',[
    'uses'=> 'ClubController@destroy',
    'as'=> 'club.destroy'
]);
Route::get('club/{id}/inscribir',[
	'uses'=>'ClubController@inscribir',
	'as'=>'club.inscribir'
]);
Route::get('club/{id}/inscrito',[
	'uses'=>'ClubController@inscrito',
	'as'=>'club.inscrito'
]);
route::get('disciplina/{id}/destroy',[
    'uses'=> 'DisciplinaController@destroy',
    'as'=> 'disciplina.destroy'
]);
Route::resource('gestion','GestionController');
