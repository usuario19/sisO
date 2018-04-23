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
   return view('plantillas.menu_inicio');
	//return view('disciplina.reg_disc');
});

Route::resource('usuario','UsuarioController');

Route::resource('disciplina','DisciplinaController');

Route::resource('club','ClubController');

Route::resource('gestion','GestionController');
