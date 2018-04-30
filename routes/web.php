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

Route::resource('jugador','JugadorController');

Route::resource('disciplina','DisciplinaController');

Route::resource('club','ClubController');
route::get('club/{id}/destroy',[
    'uses'=> 'ClubController@destroy',
    'as'=> 'club.destroy'
]);

Route::resource('gestion','GestionController');
