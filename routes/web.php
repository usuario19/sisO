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
 
	 Route::post('log',[ 
			 'uses'=> 'AutentificacionController@store',
			 'as' => 'login.store']);
 
	 Route::get('iniciarSesion',[ 
				 'uses'=> 'AutentificacionController@index',
				 'as' => 'login']);


	/*login*/
		/* Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout'); */

        // Registration Routes...
       /* Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
       	Route::post('register', 'Auth\RegisterController@register');
	*/
        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

	/*..........................................*/
	Route::get('/home', 'HomeController@index')->name('home');


	//Route::resource('login','LoginController');
	Route::get('/', function () {
   	return view('home');
	});

	Route::post('log',[ 
			'uses'=> 'AutentificacionController@store',
			'as' => 'login.store']);

	Route::get('iniciar sesion',[ 
				'uses'=> 'AutentificacionController@index',
				'as' => 'login']);

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
				'as' => 'gestion.mostrar'
			]);
	Route::get('gestiones',[ 
		'uses'=> 'GestionController@mostrarGestion_principal',
		'as' => 'gestion.mostrar_principal'
	]);
	Route::get('clubs',[ 
		'uses'=> 'ClubController@clubs_principal',
		'as' => 'club.mostrar_principal'
	]);

	Route::get('disicplinas',[ 
		'uses'=> 'PrincipalController@listar_disciplinas',
		'as' => 'principal.listar_disciplinas'
	]);

	Route::get('gestiones/{gestion}/informacion',[ 
		'uses'=> 'PrincipalController@gestion_info',
		'as' => 'principal.gestion_info'
	]);

	Route::get('clubs/{club}/informacion',[ 
		'uses'=> 'PrincipalController@club_info',
		'as' => 'principal.club_info'
	]);

	Route::get('resultados',[ 
		'uses'=> 'PrincipalController@consultar_resultados',
		'as' => 'principal.consultar_resultados'
	]);
	Route::get('partidos',[ 
		'uses'=> 'PrincipalController@consultar_partidos',
		'as' => 'principal.consultar_partidos'
	]);

	Route::get('noticias',[ 
		'uses'=> 'PrincipalController@noticias',
		'as' => 'principal.noticias'
	]);

	Route::get('disciplinas/{disciplina}/informacion',[ 
		'uses'=> 'PrincipalController@disciplina_info',
		'as' => 'principal.disciplina_info'
	]);

	Route::post('coordinador/partidos/participaciones',[ 
		'uses'=> 'PrincipalController@obtener_disciplinas',
		'as' => 'principal.obtener_part']);
	
});

//RUTAS QUE NECESITAS ESTAR LOQUEADO/A PARA VERLOS
Route::group(['middleware' => 'auth'], function () {
    //
    Route::get('welcome', function () {
   		return view('welcome');
	//return view('disciplina.reg_disc');
	});
	Route::get('logout',[ 
			'uses'=> 'AutentificacionController@logout',
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

	/* Route::any('administrador/update/{administrador}',[ 
		'uses'=> 'AdministradorController@update',
		'as' => 'administrador.update']); */

	Route::put('administrador/update/{administrador}',[ 
		'uses'=> 'AdministradorController@update',
		'as' => 'administrador.update']);

	Route::get('administrador/{administrador}',[ 
				'uses'=> 'AdministradorController@show',
				'as' => 'administrador.show']);

	Route::get('administrador/{administrador}/edit',[ 
				'uses'=> 'AdministradorController@edit',
				'as' => 'administrador.edit']);

	
	

	Route::get('administrador/{administrador}/informacion',[ 
				'uses'=> 'AdministradorController@verInformacion',
				'as' => 'administrador.informacion']);

	Route::get('administrador/{administrador}/informacion_club',[ 
		'uses'=> 'AdministradorController@verInformacion_club',
		'as' => 'administrador.informacion_club']);

	Route::get('administrador/{administrador}/informacion_club_resultados',[ 
		'uses'=> 'AdministradorController@verInformacion_club_resultados',
		'as' => 'administrador.informacion_club_resultados']);
	
	Route::get('administrador/{id}/destroy',[ 
				'uses'=> 'AdministradorController@destroy',
				'as' => 'administrador.destroy']);
		

	Route::post('administrador/validarCI',[ 
				'uses'=> 'AdministradorController@validarCI',
				'as' => 'administrador.validar']);

	Route::post('administrador/registrar_importExcel',[
		'uses'=>'AdministradorController@importExcel',
		'as'=>'administrador.importExcel']);

	//DISCIPLINA

	//Route::resource('disciplina','DisciplinaController');

	Route::post('disciplina/store',[ 
				'uses'=> 'DisciplinaController@store',
				'as' => 'disciplina.store']);


	Route::get('disciplina/create',[ 
				'uses'=> 'DisciplinaController@create',
				'as' => 'disciplina.create']);

	Route::put('disciplina/',[ 
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
	route::get('disciplina/{id_gestion}/{id_disc}/fases',[
	    'uses'=> 'DisciplinaController@fases',
	    'as'=> 'disciplina.fases'
	]);
	//CLUB
	//Route::resource('club','ClubController');
	
	Route::get('club/datosclub',[ 
		'uses'=> 'ClubController@datos',
			'as' => 'datosclub']);

	Route::post('club/store',[ 
				'uses'=> 'ClubController@store',
				'as' => 'club.store']);

	Route::get('club/create',[ 
			'uses'=> 'ClubController@create',
			'as' => 'club.create']);
	
	Route::put('club/',[ 
				'uses'=> 'ClubController@update',
				'as' => 'club.update']);
	
	Route::get('club/{id}/gestiones_disp',[ 
			'uses'=> 'ClubController@gestiones_disp',
			'as' => 'club.gestiones_disp']);
	
	//GESTION
	//Route::resource('gestion','GestionController');
	Route::post('gestion/store',[ 
				'uses'=> 'GestionController@store',
				'as' => 'gestion.store']);

	Route::get('gestion',[ 
				'uses'=> 'GestionController@index',
				'as' => 'gestion.index']);

	Route::get('gestion/create',[ 
				'uses'=> 'GestionController@create',
				'as' => 'gestion.create']);

	Route::post('gestion_update',[ 
				'uses'=> 'GestionController@update',
				'as' => 'gestion.update']);

	Route::get('gestion/{id_gestion}',[ 
				'uses'=> 'GestionController@show',
				'as' => 'gestion.show']);

	Route::get('gestion/{gestion}/edit',[ 
				'uses'=> 'GestionController@edit',
				'as' => 'gestion.edit']);

	Route::get('gestion/{id}/destroy',[
	    'uses'=> 'GestionController@destroy',
	    'as'=> 'gestion.destroy'
	]);
	Route::get('gestion/{id}/disciplinas',[
	    'uses'=> 'GestionController@destroy',
	    'as'=> 'gestion.destroy'
	]);
	Route::post('agregar_disciplinas',[
	    'uses'=> 'GestionController@agregar_disciplinas',
	    'as'=> 'gestion.agregar_disciplinas'
	]);
	Route::get('gestion/{id_gestion}/{id_disc}/eliminar_disciplina',[
	    'uses'=> 'GestionController@eliminar_disciplina',
	    'as'=> 'gestion.eliminar_disciplina'
	]);
	Route::get('gestion/{id_gestion}/listar_clubs',[
	    'uses'=> 'GestionController@listar_clubs',
	    'as'=> 'gestion.listar_clubs'
	]);
	Route::get('gestion/{id_gestion}/clasificacion',[
	    'uses'=> 'GestionController@clasificacion',
	    'as'=> 'gestion.clasificacion'
	]);

	Route::get('gestion/{id_gestion}/resultados',[
	    'uses'=> 'GestionController@resultados',
	    'as'=> 'gestion.resultados'	
	]);
	
	Route::post('agregar_clubs_inscripcion',[
	    'uses'=> 'GestionController@agregar_clubs_inscripcion',
	    'as'=> 'gestion.agregar_clubs_inscripcion'
	]);

	/* Route::get('gestion/{id_gestion}/resultados',[
	    'uses'=> 'GestionController@resultados',
	    'as'=> 'gestion.resultados'
	]); */
	
	Route::get('gestion/{id}/listar_disciplinas_json',[
	    'uses'=> 'GestionController@listar_disciplinas_json',
	    'as'=> 'gestion.listar_disciplinas_json'
	]);
	Route::get('gestion/{id_disc}/listar_fases',[
	    'uses'=> 'GestionController@listar_fases',
	    'as'=> 'gestion.listar_fases'

	]);
	Route::post('gestion',[
	    'uses'=> 'GestionController@mostrar_resultados',
	    'as'=> 'gestion.mostrar_resultados'
	]);

	//JUGADOR_INSCRIPCION
	Route::post('inscripcion_jugador',[ 
				'uses'=> 'JugadorClubController@store',
				'as' => 'jugador_club.store']);

	Route::get('gestion/{id}/clubs',[
	    'uses'=> 'GestionController@clubs',
	    'as'=> 'gestion.clubs'
	]);
	Route::get('gestion/{id}/disciplinas',[
	    'uses'=> 'GestionController@disciplinas',
	    'as'=> 'gestion.disciplinas'
	]);
	Route::get('gestion/{id_gestion}/configurar',[ 
				'uses'=> 'GestionController@configurar',
				'as' => 'gestion.configurar'
			]);
	//fases
	Route::get('fase',[
		'uses'=>'FaseController@index',
		'as'=>'fase.index'
	]);
	Route::get('fase/{id_disc}/{id_gestion}/create',[
		'uses'=>'FaseController@create',
		'as'=>'fase.create'
	]);
	Route::post('fase/store',[
		'uses'=>'FaseController@store',
		'as'=>'fase.store'
	]);
	Route::get('fase/{id_fase}/destroy',[
		'uses'=>'FaseController@destroy',
		'as'=>'fase.destroy'
	]);
	Route::get('fase/{id_fase}/{id_gestion}/{id_disc}/listar_grupos',[
		'uses'=>'FaseController@listar_grupos',
		'as'=>'fase.listar_grupos'
	]);
	
	Route::get('fase/{id_fase}/{id_gestion}/{id_disc}/eliminacion_encuentro',[
		'uses'=>'FaseController@eliminacion_encuentro',
		'as'=>'fase.eliminacion_encuentro'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/clubs_eliminacion_equipo',[
		'uses'=>'FaseController@clubs_eliminacion_equipo',
		'as'=>'fase.clubs_eliminacion_equipo'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/fechas_eliminacion_equipo',[
		'uses'=>'FaseController@fechas_eliminacion_equipo',
		'as'=>'fase.fechas_eliminacion_equipo'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/encuentros_eliminacion_equipo',[
		'uses'=>'FaseController@encuentros_eliminacion_equipo',
		'as'=>'fase.encuentros_eliminacion_equipo'
	]);
	Route::get('fase/{id_fase}/{id_gestion}/{id_disc}/eliminacion_encuentro_competicion',[
		'uses'=>'FaseController@eliminacion_encuentro_competicion',
		'as'=>'fase.eliminacion_encuentro_competicion'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/clubs_eliminacion_competicion',[
		'uses'=>'FaseController@clubs_eliminacion_competicion',
		'as'=>'fase.clubs_eliminacion_competicion'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/fechas_eliminacion_competicion',[
		'uses'=>'FaseController@fechas_eliminacion_competicion',
		'as'=>'fase.fechas_eliminacion_competicion'
	]);
	Route::get('fase/{id_fase}/{id_disc}/{id_gestion}/encuentros_eliminacion_competicion',[
		'uses'=>'FaseController@encuentros_eliminacion_competicion',
		'as'=>'fase.encuentros_eliminacion_competicion'
	]);
	Route::post('fase/store_club_eliminacion',[
		'uses'=>'FaseController@store_club_eliminacion',
		'as'=>'fase.store_club_eliminacion'
	]);
	Route::post('fase/store_club_eliminacion_competicion',[
		'uses'=>'FaseController@store_club_eliminacion_competicion',
		'as'=>'fase.store_club_eliminacion_competicion'
	]);
	Route::get('fase/{id_fase}/{id_club_part}eliminar_club_eliminacion',[
		'uses'=>'FaseController@eliminar_club_eliminacion',
		'as'=>'fase.eliminar_club_eliminacion'
	]);
	Route::get('fase/{id_disc}/select_fases',[
		'uses'=>'FaseController@select_fases',
		'as'=>'fase.select_fases'
	]);
	//grupos
	Route::get('grupo',[
		'uses'=>'GrupoController@index',
		'as'=>'grupo.index'
	]);
	Route::get('grupo/{id_fase}/{id_gestion}/{id_disc}/create',[
		'uses'=>'GrupoController@create',
		'as'=>'grupo.create'
	]);
	Route::post('grupo/store',[
		'uses'=>'GrupoController@store',
		'as'=>'grupo.store'
	]);
	Route::get('grupo/{id}/destroy',[
		'uses'=>'GrupoController@destroy',
		'as'=>'grupo.destroy'
	]);
	Route::get('grupo/{id}/mostrar_grupos',[
		'uses'=>'GrupoController@mostrar_grupos',
		'as'=>'grupo.mostrar_grupos'
	]);
	Route::get('grupo/{id_grupo}/{id_gestion}/{id_disc}/{id_fase}/listar_clubs',[
		'uses'=>'GrupoController@listar_clubs',
		'as'=>'grupo.listar_clubs'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/clubs_grupo_equipo',[
		'uses'=>'GrupoController@clubs_grupo_equipo',
		'as'=>'grupo.clubs_grupo_equipo'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/fechas_grupo_equipo',[
		'uses'=>'GrupoController@fechas_grupo_equipo',
		'as'=>'grupo.fechas_grupo_equipo'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/encuentros_grupo_equipo',[
		'uses'=>'GrupoController@encuentros_grupo_equipo',
		'as'=>'grupo.encuentros_grupo_equipo'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/clubs_grupo_competicion',[
		'uses'=>'GrupoController@clubs_grupo_competicion',
		'as'=>'grupo.clubs_grupo_competicion'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/fechas_grupo_competicion',[
		'uses'=>'GrupoController@fechas_grupo_competicion',
		'as'=>'grupo.fechas_grupo_competicion'
	]);
	Route::get('grupo/{id_grupo}/{id_fase}/{id_disc}/{id_gestion}/encuentros_grupo_competicion',[
		'uses'=>'GrupoController@encuentros_grupo_competicion',
		'as'=>'grupo.encuentros_grupo_competicion'
	]);
	Route::post('grupo/store_club',[
		'uses'=>'GrupoController@store_club',
		'as'=>'grupo.store_club'
	]);
	Route::get('grupo/{id_grupo}/{id_club_part}/eliminar_club',[
		'uses'=>'GrupoController@eliminar_club',
		'as'=>'grupo.eliminar_club'
	]);
	Route::get('grupo/{id_grupo}/{id_gestion}/{id_disc}/{id_fase}/listar_clubs_competicion',[
		'uses'=>'GrupoController@listar_clubs_competicion',
		'as'=>'grupo.listar_clubs_competicion'
	]);
	
	//FECHA
	Route::post('fecha/store',[
		'uses'=>'FechaController@store',
		'as'=>'fecha.store'
	]);
	Route::post('fecha/store_fecha_eliminacion',[
		'uses'=>'FechaController@store_fecha_eliminacion',
		'as'=>'fecha.store_fecha_eliminacion'
	]);
	Route::get('fecha/{id_fase}/{id_gestion}/{id_disc}/listar_fechas',[
		'uses'=>'FechaController@listar_fechas',
		'as'=>'fecha.listar_fechas'
	]);
	Route::get('fecha/{id_fecha}/destroy',[
		'uses'=>'FechaController@destroy',
		'as'=>'fecha.destroy'
	]);
	//encuentro
	Route::post('encuentro/store',[
		'uses'=>'EncuentroController@store',
		'as'=>'encuentro.store'
	]);
	Route::post('encuentro/store_eliminacion',[
		'uses'=>'EncuentroController@store_eliminacion',
		'as'=>'encuentro.store_eliminacion'
	]);
	Route::post('encuentro/store_competicion_serie',[
		'uses'=>'EncuentroController@store_competicion_serie',
		'as'=>'encuentro.store_competicion_serie'
	]);
	Route::get('encuentro/{id_encuentro}/destroy',[
		'uses'=>'EncuentroController@destroy',
		'as'=>'encuentro.destroy'
	]);
	Route::get('encuentro/{id_encuentro}/mostrar_resultado_ajax',[
		'uses'=>'EncuentroController@mostrar_resultado_ajax',
		'as'=>'encuentro.mostrar_resultado_ajax'
	]);
	Route::get('encuentro/fixture',[
		'uses'=>'EncuentroController@fixture',
		'as'=>'encuentro.fixture'
	]);
	Route::post('encuentro/reg_resultado',[
		'uses'=>'EncuentroController@reg_resultado',
		'as'=>'encuentro.reg_resultado'
	]);
	Route::post('encuentro/reg_resultado_competicion',[
		'uses'=>'EncuentroController@reg_resultado_competicion',
		'as'=>'encuentro.reg_resultado_competicion'
	]);
	Route::get('encuentro/{id_club}/{id_grupo}/select_contrincante',[
		'uses'=>'EncuentroController@select_contrincante',
		'as'=>'encuentro.select_contrincante'
	]);
	Route::get('encuentro/{id_club}/{id_fase}/select_contrincante_eliminacion',[
		'uses'=>'EncuentroController@select_contrincante_eliminacion',
		'as'=>'encuentro.select_contrincante_eliminacion'
	]);
});

//COORDINADOR
Route::group(['middleware' => ['auth','admin_coordinador']], function () {

	
	
		
	Route::get('administrador/{administrador}/edit',[ 
		'uses'=> 'AdministradorController@edit',
		'as' => 'administrador.edit']);
	
	Route::get('coordinador/{administrador}/perfil',[ 
			'uses'=> 'AdministradorController@show',
			'as' => 'administrador.show']);

	Route::put('administrador/update/{administrador}',[ 
			'uses'=> 'AdministradorController@update',
			'as' => 'administrador.update']);

	Route::post('administrador/updateFoto',[ 
				'uses'=> 'AdministradorController@updateFoto',
				'as' => 'administrador.updateFoto']);

	Route::post('coordinador/updateFotoClub',[ 
		'uses'=> 'CoordinadorController@updateFotoClub',
		'as' => 'coordinador.updateFotoClub']);


	//JUGADOR
	//Route::resource('jugador','JugadorController');
	Route::post('jugador/updateFoto',[ 
		'uses'=> 'JugadorController@updateFoto',
		'as' => 'jugador.updateFoto']);
		
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

	Route::get('jugador/{jugador}/informacion',[ 
		'uses'=> 'JugadorController@verInformacion',
		'as' => 'jugador.informacion']);

	Route::get('jugador/{jugador}/{club}/informacion',[ 
		'uses'=> 'JugadorController@verInformacion_jug_club',
		'as' => 'jugador.informacion_jug_club']);
	
	Route::get('jugador/{jugador}/{club}/participacion',[ 
			'uses'=> 'JugadorController@verInformacion_jug_participacion',
			'as' => 'jugador.informacion_jug_participacion']);
		
	Route::get('jugador/{jugador}/informacion_club',[ 
		'uses'=> 'JugadorController@verInformacion_club',
		'as' => 'jugador.informacion_club']);

	Route::get('jugador/{jugador}/informacion_club_resultados',[ 
		'uses'=> 'JugadorController@verInformacion_club_resultados',
		'as' => 'jugador.informacion_club_resultados']);
			


	Route::get('jugador/{id}/destroy',[ 
				'uses'=> 'JugadorController@destroy',
				'as' => 'jugador.destroy']);	

	Route::put('club/',[ 
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
	Route::get('club/{id_gestion}/{id_club}/listar_jugadores',[
		'uses'=>'ClubController@listar_jugadores',
		'as'=>'club.listar_jugadores'
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

	Route::get('coordinador/{id_club}/{id_gestion}/inscripcion',[ 
				'uses'=> 'DisciplinaController@ver_disciplinas_jugadores',
				'as' => 'disciplina.ver_disciplinas']);

	Route::get('coordinador/{id_club}/{id_gestion}/disciplinas',[ 
		'uses'=> 'DisciplinaController@ver_disciplinas',
		'as' => 'disciplina.ver_disciplinas_inscritas']);
		
		

	

	Route::post('coordinador',[ 
				'uses'=> 'DisciplinaController@store_disc_club',
				'as' => 'disciplina.store_disc']);

				

	Route::post('coordinador/filtrar',[ 
				'uses'=> 'CoordinadorController@filtrar',
				'as' => 'coordinador.filtrar']);

				
	
	Route::get('coordinador/gestiones',[ 
	'uses'=> 'CoordinadorController@ver_misGestiones',
	'as' => 'coordinador.mis_gestiones']);

	Route::get('coordinador/clubs/jugadores',[ 
		'uses'=> 'CoordinadorController@filtrar_jugadores',
		'as' => 'coordinador.club_jugadores_ajax']);

	Route::post('coordinador/{id}',[ 
				'uses'=> 'DisciplinaController@update_disc_club',
				'as' => 'disciplina.update_disc']);

	Route::get('coordinador/{id}/{id_club}/eliminar',[ 
				'uses'=> 'CoordinadorController@eliminar',
				'as' => 'coordinador.eliminar']);

	Route::put('coordinador/updateClub/{club}',[ 
				'uses'=> 'CoordinadorController@update_club',
				'as' => 'coordinador.update_club']);

	Route::get('coordinador/configuracion/{id_club}',[ 
		'uses'=> 'CoordinadorController@informacion_club',
		'as' => 'coordinador.informacion_club']);

	Route::post('coordinador/gestiones_activas/club',[ 
		'uses'=> 'CoordinadorController@club_gestiones',
		'as' => 'coordinador.club_gestiones']);

	Route::get('coordinador/gestiones/{id_club}',[ 
		'uses'=> 'CoordinadorController@informacion_club_gestiones',
		'as' => 'coordinador.informacion_club_gestiones']);

	Route::post('coordinador/jugadores/club',[ 
			'uses'=> 'CoordinadorController@club_jugadores',
			'as' => 'coordinador.club_jugadores']);

	Route::get('coordinador/pdf/jugadores/{id_club}',[ 
				'uses'=> 'CoordinadorController@pdf_jugadores',
				'as' => 'coordinador.pdf_jugadores']);

	Route::post('coordinador/club/inf',[ 
		'uses'=> 'CoordinadorController@index_ajax',
		'as' => 'coordinador.index_ajax']);

	Route::get('coordinador/jugadores/club/{id_club}',[ 
		'uses'=> 'CoordinadorController@club_jugadores2',
		'as' => 'coordinador.club_jugadores2']);


	Route::get('disciplina/{id}/eliminar',[ 
				'uses'=> 'DisciplinaController@eliminar',
				'as' => 'disciplina.eliminar']);

	Route::get('disciplina/{id}/seleccion',[ 
		'uses'=> 'DisciplinaController@ver_seleccion_club',
		'as' => 'disciplina.ver_seleccion_club']);

	Route::get('seleccion/{id}/jugadores',[
				'uses'=>'SeleccionController@create_ajax',
				'as'=>'seleccion.create_ajax']);

	Route::post('seleccion/jugadores/disc',[
				'uses'=>'SeleccionController@create',
				'as'=>'seleccion.create']);

	Route::post('seleccion/store',[
				'uses'=>'SeleccionController@store',
				'as'=>'seleccion.store']);

	Route::post('seleccion/deshabilitar',[
				'uses'=>'SeleccionController@deshabilitar',
				'as'=>'seleccion.deshabilitar']);

	Route::get('seleccion/misJugadores/{id}/{id_club}/participacion',[
				'uses'=>'SeleccionController@ver_seleccion',
				'as'=>'seleccion.ver_seleccion']);

	Route::get('jugadores/importExcel/{id_club}',[
				'uses'=>'JugadorController@viewImportExcel',
				'as'=>'jugador.VImportExcel']);

	Route::post('jugadores/registrar_importExcel',[
				'uses'=>'JugadorController@importExcel',
				'as'=>'jugador.importExcel']);

	Route::post('jugador_inscripcion',[
		'uses'=>'JugadorInscripcionController@store',
		'as'=>'jugador_inscripcion.store']);

	Route::post('jugador_inscripcion/deshabilitar',[
		'uses'=>'JugadorInscripcionController@deshabilitar',
		'as'=>'jugador_inscripcion.deshabilitar']);

	Route::get('coordinador/partidos',[ 
			'uses'=> 'PartidoController@ver_los_partidos',
			'as' => 'partido.ver_partidos']);
			
	Route::post('coordinador/partidos/club',[ 
		'uses'=> 'PartidoController@obtener_gestiones',
		'as' => 'partido.obtener_gestiones']);

	Route::post('coordinador/partidos/club/gestiones',[ 
		'uses'=> 'PartidoController@obtener_disciplinas',
		'as' => 'partido.obtener_disciplinas']);

	Route::post('coordinador/partidos/club/encuentros',[ 
		'uses'=> 'PartidoController@obtener_clubs_encuentros',
		'as' => 'partido.clubs_encuentros']);
	
	Route::post('partidos/encuentros',[ 
		'uses'=> 'PartidoController@listar_partidos',
		'as' => 'partido.listar_partidos']);

	Route::get('map', 'MapaController@index');

	Route::get('coordinador/{coordinador}',[ 
			'uses'=> 'CoordinadorController@show',
			'as' => 'coordinador.show']);

	Route::get('lugares',[ 
		'uses'=> 'LugarController@index',
		'as' => 'lugares.index']);

	Route::post('centro/store',[ 
		'uses'=> 'LugarController@store',
		'as' => 'centro.store']);

	Route::get('centro/{centro}/delete',[ 
		'uses'=> 'LugarController@destroy',
		'as' => 'centro.delete']);
});