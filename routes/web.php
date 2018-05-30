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



//RUTAS QUE NO NECESITAS ESTAR LOGUEADO/A PARA INGRESAR
Route::group(['middleware' => ['web','guest']],function(){

	//Route::resource('login','LoginController');
	Route::get('/', function () {
   	return view('home');
	});

	Route::post('login',[ 
			'uses'=> 'LoginController@store',
			'as' => 'login']);


	Route::get('login',[ 
				'uses'=> 'LoginController@index',
				'as' => 'login.index']);

	Route::get('jugador/mostrar',[ 
				'uses'=> 'JugadorController@mostrarJugador',
				'as' => 'jugador.mostrar']);

	Route::get('disciplina/mostrar',[ 
			'uses'=> 'DisciplinaController@mostrarDisc',
			'as' => 'disciplina.mostrar']);

	Route::get('club/mostrar',[ 
			'uses'=> 'ClubController@mostrarClub',
			'as' => 'club.mostrar']);
	
	Route::get('gestion/mostrar',[ 
				'uses'=> 'GestionController@mostrarGestion',
				'as' => 'gestion.mostrar']);
});

//RUTAS QUE NECESITAS ESTAR LOQUEADO/A PARA VERLOS
Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('welcome', function () {
   		return view('welcome');
	//return view('disciplina.reg_disc');
	});
	Route::get('logout',[ 
			'uses'=> 'LoginController@logout',
			'as' => 'logout']);
});



//ADMINISTRADOR
//Route::resource('administrador','AdministradorController');
Route::group(['middleware' => ['auth','administrador']], function () {

	Route::post('administrador',[ 
				'uses'=> 'AdministradorController@store',
				'as' => 'administrador.store']);

	Route::get('administrador',[ 
				'uses'=> 'AdministradorController@index',
				'as' => 'administrador.index']);

	Route::get('administrador/create',[ 
				'uses'=> 'AdministradorController@create',
				'as' => 'administrador.create']);

	Route::put('administrador/{administrador}',[ 
				'uses'=> 'AdministradorController@update',
				'as' => 'administrador.update']);

	Route::get('administrador/{administrador}',[ 
				'uses'=> 'AdministradorController@show',
				'as' => 'administrador.show']);

	Route::get('administrador/{administrador}/edit',[ 
				'uses'=> 'AdministradorController@edit',
				'as' => 'administrador.edit']);

	Route::get('administrador/{id}/destroy',[ 
				'uses'=> 'AdministradorController@destroy',
				'as' => 'administrador.destroy']);

	//DISCIPLINA

	//Route::resource('disciplina','DisciplinaController');

	Route::post('disciplina',[ 
				'uses'=> 'DisciplinaController@store',
				'as' => 'disciplina.store']);


	Route::get('disciplina/create',[ 
				'uses'=> 'DisciplinaController@create',
				'as' => 'disciplina.create']);

	Route::put('disciplina/{disciplina}',[ 
				'uses'=> 'DisciplinaController@update',
				'as' => 'disciplina.update']);

	Route::get('disciplina/{disciplina}',[ 
				'uses'=> 'DisciplinaController@show',
				'as' => 'disciplina.show']);

	Route::get('disciplina/{disciplina}/edit',[ 
				'uses'=> 'DisciplinaController@edit',
				'as' => 'disciplina.edit']);

	route::get('disciplina/{id}/destroy',[
	    'uses'=> 'DisciplinaController@destroy',
	    'as'=> 'disciplina.destroy'
	]);
	route::get('disciplina/{id}/{id_gestion}/fases',[
	    'uses'=> 'DisciplinaController@fases',
	    'as'=> 'disciplina.fases'
	]);
	//CLUB
	//Route::resource('club','ClubController');
	Route::post('club',[ 
				'uses'=> 'ClubController@store',
				'as' => 'club.store']);

	Route::get('club/create',[ 
			'uses'=> 'ClubController@create',
			'as' => 'club.create']);
	
	Route::get('club/{id}/gestiones_disp',[ 
			'uses'=> 'ClubController@gestiones_disp',
			'as' => 'club.gestiones_disp']);
	
	//GESTION
	//Route::resource('gestion','GestionController');
	Route::post('gestion',[ 
				'uses'=> 'GestionController@store',
				'as' => 'gestion.store']);

	Route::get('gestion',[ 
				'uses'=> 'GestionController@index',
				'as' => 'gestion.index']);

	Route::get('gestion/create',[ 
				'uses'=> 'GestionController@create',
				'as' => 'gestion.create']);

	Route::put('gestion/{gestion}',[ 
				'uses'=> 'GestionController@update',
				'as' => 'gestion.update']);

	Route::get('gestion/{gestion}',[ 
				'uses'=> 'GestionController@show',
				'as' => 'gestion.show']);

	Route::get('gestion/{gestion}/edit',[ 
				'uses'=> 'GestionController@edit',
				'as' => 'gestion.edit']);

	route::get('gestion/{id}/destroy',[
	    'uses'=> 'GestionController@destroy',
	    'as'=> 'gestion.destroy'
	]);

	//JUGADOR_INSCRIPCION
	Route::post('registrar',[ 
				'uses'=> 'JugadorInscripcionController@store',
				'as' => 'jugador_inscripcion.store']);

	route::get('gestion/{id}/clubs',[
	    'uses'=> 'GestionController@clubs',
	    'as'=> 'gestion.clubs'
	]);
	route::get('gestion/{id}/disciplinas',[
	    'uses'=> 'GestionController@disciplinas',
	    'as'=> 'gestion.disciplinas'
	]);
	//fases
	route::get('fase',[
		'uses'=>'FaseController@index',
		'as'=>'fase.index'
	]);
	route::get('fase/{id_disc}/{id_gestion}/create',[
		'uses'=>'FaseController@create',
		'as'=>'fase.create'
	]);
	route::post('fase/store',[
		'uses'=>'FaseController@store',
		'as'=>'fase.store'
	]);
	route::get('fase/{id_fase}/listar_grupos',[
		'uses'=>'FaseController@listar_grupos',
		'as'=>'fase.listar_grupos'
	]);
	//grupos
	route::get('grupo',[
		'uses'=>'GrupoController@index',
		'as'=>'grupo.index'
	]);
	route::get('grupo/{id_fase}/create',[
		'uses'=>'GrupoController@create',
		'as'=>'grupo.create'
	]);
	route::post('grupo/crearGrupos',[
		'uses'=>'GrupoController@crearGrupos',
		'as'=>'grupo.crearGrupos'
	]);
	route::post('grupo/store',[
		'uses'=>'GrupoController@store',
		'as'=>'grupo.store'
	]);
});

//COORDINADOR
Route::group(['middleware' => ['auth','admin_coordinador']], function () {

	//JUGADOR
	//Route::resource('jugador','JugadorController');
	Route::post('jugador',[ 
				'uses'=> 'JugadorController@store',
				'as' => 'jugador.store']);

	Route::get('jugador/create',[ 
				'uses'=> 'JugadorController@create',
				'as' => 'jugador.create']);

	Route::put('jugador/{jugador}',[ 
				'uses'=> 'JugadorController@update',
				'as' => 'jugador.update']);

	Route::get('jugador/{jugador}',[ 
				'uses'=> 'JugadorController@show',
				'as' => 'jugador.show']);

	Route::get('jugador/{jugador}/edit',[ 
				'uses'=> 'JugadorController@edit',
				'as' => 'jugador.edit']);

	Route::get('jugador/{id}/destroy',[ 
				'uses'=> 'JugadorController@destroy',
				'as' => 'jugador.destroy']);	

	Route::put('club/{club}',[ 
				'uses'=> 'ClubController@update',
				'as' => 'club.update']);

	Route::get('club/{club}',[ 
				'uses'=> 'ClubController@show',
				'as' => 'club.show']);

	Route::get('club/{club}/edit',[ 
				'uses'=> 'ClubController@edit',
				'as' => 'club.edit']);

	route::get('club/{id}/destroy',[
	    'uses'=> 'ClubController@destroy',
	    'as'=> 'club.destroy'
	]);
	Route::get('club/{id}/{id_gestion}/inscribir',[
		'uses'=>'ClubController@inscribir',
		'as'=>'club.inscribir'
	]);
	Route::get('club/{id}/{id_gestion}/desinscribir',[
		'uses'=>'ClubController@desinscribir',
		'as'=>'club.desinscribir'
	]);
	Route::get('club/{id}/inscrito',[
		'uses'=>'ClubController@inscrito',
		'as'=>'club.inscrito'
	]);

	Route::get('jugador',[ 
				'uses'=> 'JugadorController@index',
				'as' => 'jugador.index']);

	Route::get('disciplina',[ 
			'uses'=> 'DisciplinaController@index',
			'as' => 'disciplina.index']);

	Route::get('club',[ 
			'uses'=> 'ClubController@index',
			'as' => 'club.index']);

	//COORDINADOR
	Route::get('coordinador',[ 
				'uses'=> 'CoordinadorController@index',
				'as' => 'coordinador.index']);

	Route::get('coordinador/gestiones',[ 
				'uses'=> 'CoordinadorController@ver_misGestiones',
				'as' => 'coordinador.mis_gestiones']);
	
	//muetra todo jugadores de clubs de un coordinador
	Route::get('coordinador/ver_misJugadores',[ 
				'uses'=> 'CoordinadorController@ver_misJugadores',
				'as' => 'coordinador.mostrarJugadores']);

	Route::get('coordinador/{id_club}/{id_gestion}/disciplinas',[ 
				'uses'=> 'DisciplinaController@ver_disciplinas',
				'as' => 'disciplina.ver_disciplinas']);

	Route::get('coordinador/{coordinador}',[ 
				'uses'=> 'CoordinadorController@show',
				'as' => 'coordinador.show']);

	Route::post('coordinador',[ 
				'uses'=> 'DisciplinaController@store_disc_club',
				'as' => 'disciplina.store_disc']);

	Route::post('coordinador/filtrar',[ 
				'uses'=> 'CoordinadorController@filtrar',
				'as' => 'coordinador.filtrar']);

	Route::post('coordinador/{id}',[ 
				'uses'=> 'DisciplinaController@update_disc_club',
				'as' => 'disciplina.update_disc']);

	Route::get('coordinador/{id}/{id_club}/eliminar',[ 
				'uses'=> 'CoordinadorController@eliminar',
				'as' => 'coordinador.eliminar']);

	Route::get('disciplina/{id}/eliminar',[ 
				'uses'=> 'DisciplinaController@eliminar',
				'as' => 'disciplina.eliminar']);

	Route::get('seleccion/{id}/create',[
				'uses'=>'SeleccionController@create',
				'as'=>'seleccion.create']);

	Route::post('seleccion',[
				'uses'=>'SeleccionController@store',
				'as'=>'seleccion.store']);

	Route::post('seleccion/deshabilitar',[
				'uses'=>'SeleccionController@deshabilitar',
				'as'=>'seleccion.deshabilitar']);

	

	
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//>>>>>>> refs/remotes/origin/master
