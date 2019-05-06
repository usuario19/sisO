<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Gestion;
use App\Models\Club;
use App\Models\Fase;
use App\Models\Disciplina;
use App\Models\Encuentro;
use App\Models\Fase_Tipo;
use App\Models\Fecha;
use App\Models\Centro;
use App\Models\Grupo_Club_Participacion;
use Illuminate\Support\Facades\DB;
use App\Models\Tabla_Posicion;
use App\Models\Tabla_Posiciones_Set;
use App\Models\Club_Participacion;
use App\Models\Grupo_Seleccion;
use App\Models\Tabla_Posicion_Jugador;
use App\Models\Seleccion;

class GrupoController extends Controller
{
    public function index()
    { 
    }
    public function create($id_fase,$id_gestion,$id_disc){   
        $gestion = Gestion::find($id_gestion);
        $fase = Fase::find($id_fase);
        $disciplina = Disciplina::find($id_disc);

        return view('grupo.agregar_grupo')->with('fase',$fase)->with('gestion',$gestion)->with('disciplina',$disciplina);
    }
    public function store(Request $request){
    	$id_fase = $request->get('id_fase');
        $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');
    		switch ($request->get('cant_grupos')) {
    			case 1:
    				$grupo = new Grupo;
		    		$grupo->nombre_grupo = $request->get('nombre');
		    		$grupo->id_fase = $id_fase;
		    		$grupo->save();
    				break;
    			
    			case 2:
    				for ($i=0; $i < 2; $i++) { 
    					$grupo = new Grupo;
		    			$grupo->nombre_grupo = $request->get('nombre'.$i);
		    			$grupo->id_fase = $request->id_fase;
                        $grupo->save();
                    
                    }
                    break;
                case 3:
                    for ($i=2; $i < 5; $i++) { 
                        $grupo = new Grupo;
                        $grupo->nombre_grupo = $request->get('nombre'.$i);
                        $grupo->id_fase = $request->id_fase;
                        $grupo->save();
                    }
                    break;
                case 4:
                    for ($i=5; $i < 9; $i++) { 
                        $grupo = new Grupo;
                        $grupo->nombre_grupo = $request->get('nombre'.$i);
                        $grupo->id_fase = $request->id_fase;
                        $grupo->save();
                    }
                    break;
                case 5:
                    for ($i=9; $i < 14; $i++) { 
                        $grupo = new Grupo;
                        $grupo->nombre_grupo = $request->get('nombre'.$i);
                        $grupo->id_fase = $request->id_fase;
                        $grupo->save();
                    }
                    break;
                case 10:
                    for ($i=14; $i < 24; $i++) { 
                        $grupo = new Grupo;
                        $grupo->nombre_grupo = $request->get('nombre'.$i);
                        $grupo->id_fase = $request->id_fase;
                        $grupo->save();
                    }
    				break;
    		}
            //return redirect()->route('grupo.mostrar_grupos',$id_fase);
            return redirect()->route('fase.listar_grupos',[$id_fase,$id_gestion,$id_disc]);

    	
    }
    public function mostrar_grupos($id_fase){
        //en desuso
        // $grupos = Grupo::where('grupos.id_fase','=',$id_fase)->paginate(10);
        // $fase = Fase::where('id_fase','=',$id_fase)->first();
        // return view('grupo.listar_grupos')->with('fase',$fase)->with('grupos',$grupos);
    }
    public function listar_clubs($id_grupo,$id_gestion,$id_disc,$id_fase){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);
     
        return view('grupo.listar_grupo_equipos',compact('grupo','gestion','disciplina','fase'));
    }
    public function clubs_grupo_equipo($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);

        $clubsInscritos = DB::table('grupos')
            ->join('grupo_club_participaciones','grupos.id_grupo','grupo_club_participaciones.id_grupo')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->where('grupos.id_fase','=',$id_fase)
            ->select('grupo_club_participaciones.id_club_part')
            ->get()->toArray();

        $lista = array();
                        foreach ($clubsInscritos as $club) {
                            $lista[] = $club->id_club_part;
                        }
        
            //clubs inscritos en la disciplina
            $clubsDisponibles = DB::table('clubs')
                ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
                ->where('club_participaciones.id_gestion','=',$id_gestion)
                ->where('club_participaciones.id_disc','=',$id_disc)
                ->whereNotIn('club_participaciones.id_club_part',$lista)
                ->get();
            //clubs inscritos en el grupo
            $clubs = DB::table('grupos')
                ->join('grupo_club_participaciones','grupos.id_grupo','=','grupo_club_participaciones.id_grupo')
                ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
                ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
                ->where('grupos.id_grupo','=',$id_grupo)
                ->select('clubs.*','grupo_club_participaciones.id_club_part','grupos.id_grupo')
                ->get();
            return view('grupo.clubs_grupo_equipo',compact('clubs','clubsDisponibles','grupo','gestion','disciplina','fase'));
    }
    public function fechas_grupo_equipo($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);

        $fechas = DB::table('fechas')
                    ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
                    ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
                    ->where('grupos.id_grupo','=',$id_grupo)
                    ->select('fechas.*')->get();
        return view('grupo.fechas_grupo_equipo',compact('grupo','gestion','disciplina','fase','fechas'));
        
    }
    public function encuentros_grupo_equipo($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);
        //fechas del grupo
        $fechasLista = DB::table('fechas')
                    ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
                    ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
                    ->where('grupos.id_grupo','=',$id_grupo)
                    ->select('fechas.*')->get();
        //convertimos en arreglo para tener sus ids          
        $fechasArreglo = array();
        foreach ($fechasLista as $fecha) {
            $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        }
        //buscamos esas fechas
        $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        //los convetimos en arreglo para el encuentro
        $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        $centrosLista = Centro::all();
        $centros = array();
        foreach ($centrosLista as $centro) {
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
        //clubs habilitados en el grupo para participar de los encuentros
        
        
        $clubsParticipantes = DB::table('grupo_club_participaciones')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->select('clubs.*')
            ->get()->toArray();
            $clubsParaEncuentro = array();
            foreach ($clubsParticipantes as $club) {
                $clubsParaEncuentro[$club->id_club] = ($club->nombre_club);
            }

        if ($disciplina->es_set($id_disc)) {
            return view('grupo.encuentros_grupo_equipo_set',compact('grupo','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro','centros'));
        }elseif($disciplina->es_raquetaFronton($id_disc)){
            return view('grupo.encuentros_grupo_equipo_raqueta_fronton',compact('grupo','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro','centros'));
        } else {
            return view('grupo.encuentros_grupo_equipo',compact('grupo','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro','centros'));
        }   
        
    }

    public function select_contrincante_grupos($id_club,$id_grupo){
        $clubsInscritos = DB::table('grupo_club_participaciones')
             ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
             ->join('clubs','clubs.id_club','=','club_participaciones.id_club')
             ->where('club_participaciones.id_club','=',$id_club)
             ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
             ->select('clubs.*')->get();
        $lista = array();
                          foreach ($clubsInscritos as $club) {
                             $lista[$club->id_club] = $club->nombre_club;
                            }
            return $lista;
                  
    }
    public function listar_clubs_competicion($id_grupo,$id_gestion,$id_disc,$id_fase){
        
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $fechas = Fecha::where('id_fase','=',$id_fase)->get();
        $grupo = Grupo::find($id_grupo); 
        return view('grupo.listar_grupo_competiciones',compact('participantes','clubs','clubsDisponibles','grupo','gestion','disciplina','fase','fechas','fechas2','encuentros','centros'));
    }
    public function clubs_grupo_competicion($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        
        $grupo = Grupo::find($id_grupo);

        $clubsInscritos = DB::table('grupo_club_participaciones')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            //->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->select('grupo_club_participaciones.id_club_part')
            ->get()->toArray();
        $lista = array();
                        foreach ($clubsInscritos as $club) {
                            $lista[] = $club->id_club_part;
                        }
                        $centrosLista = Centro::all();
                        $centros = array();
                        foreach ($centrosLista as $centro) {
                            $centros[$centro->id_centro] = $centro->nombre_centro;
                        }
     
        $clubsDisponibles = DB::table('clubs')
            ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
            ->where('club_participaciones.id_gestion','=',$id_gestion)
            ->where('club_participaciones.id_disc','=',$id_disc)
            ->whereNotIn('club_participaciones.id_club_part',$lista)
            ->get();
        
        $clubs = DB::table('grupos')
            ->join('grupo_club_participaciones','grupos.id_grupo','=','grupo_club_participaciones.id_grupo')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('clubs.*','grupo_club_participaciones.id_club_part','grupos.id_grupo')
            ->get();
         
            
            return view('grupo.clubs_grupo_competicion',compact('clubs','clubsDisponibles','gestion','fase','disciplina','grupo'));
            
    }
    //SELECCIONA JUGADORES
    public function clubs_grupo_competicion_jugadores($id_grupo, $id_fase,$id_disc,$id_gestion){
        
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        
        $grupo = Grupo::find($id_grupo);

        $jugadores_inscritos = DB::table('grupo_seleccions')
                                ->join('selecciones','grupo_seleccions.id_seleccion','=','selecciones.id_seleccion')
                                //->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
                                ->select('grupo_seleccions.id_seleccion')
                                ->get()->toArray();
        /* $clubsInscritos = DB::table('grupo_club_participaciones')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            //->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->select('grupo_club_participaciones.id_club_part')
            ->get()->toArray(); */
       /*  $lista = array();
                        foreach ($clubsInscritos as $club) {
                            $lista[] = $club->id_club_part;
                        }
                        $centrosLista = Centro::all();
                        $centros = array();
                        foreach ($centrosLista as $centro) {
                            $centros[$centro->id_centro] = $centro->nombre_centro;
                        } */
        $lista = array();
        foreach ($jugadores_inscritos as $jugadores) {
            $lista[] = $jugadores->id_seleccion;
        }
        
        $centrosLista = Centro::all();
        $centros = array();
        foreach ($centrosLista as $centro) {
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
     
        /* $clubsDisponibles = DB::table('selecciones')
            ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
            ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
            ->where('club_participaciones.id_gestion','=',$id_gestion)
            ->where('club_participaciones.id_disc','=',$id_disc)
            ->whereNotIn('club_participaciones.id_club_part',$lista)
            ->get(); */
        $jugDisponibles = DB::table('jugadores')
            ->join('jugador_clubs','jugadores.id_jugador','=','jugador_clubs.id_jugador')
            ->join('selecciones','jugador_clubs.id_jug_club','=','selecciones.id_jug_club')
            ->join('club_participaciones','selecciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('club_participaciones.id_gestion','=',$id_gestion)
            ->where('club_participaciones.id_disc','=',$id_disc)
            ->whereNotIn('selecciones.id_seleccion',$lista)
            ->get();

        /* $clubs = DB::table('grupos')
            ->join('grupo_club_participaciones','grupos.id_grupo','=','grupo_club_participaciones.id_grupo')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('clubs.*','grupo_club_participaciones.id_club_part','grupos.id_grupo')
            ->get(); */
        $jugadores_participantes = DB::table('grupos')
            ->join('grupo_seleccions','grupos.id_grupo','=','grupo_seleccions.id_grupo')
            ->join('selecciones','grupo_seleccions.id_seleccion','=','selecciones.id_seleccion')
            ->join('club_participaciones','selecciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->join('jugador_clubs','selecciones.id_jug_club','=','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('jugadores.*','clubs.*','grupo_seleccions.id_seleccion','grupos.id_grupo')
            ->get();
         
            
            return view('grupo.clubs_grupo_competicion',compact('jugadores_participantes','jugDisponibles','gestion','fase','disciplina','grupo'));
            
    }
    public function fechas_grupo_competicion($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);
        //$fechas = Fecha::where('id_fase','=',$id_fase)->get();
        
        //todas las fechas del grupo
        $fechasLista = DB::table('fechas')
            ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
            ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('fechas.*')->get();
        //se convierte en arreglo
        $fechasArreglo = array();
        foreach ($fechasLista as $fecha) {
            $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        }
        //obtenemos los objetos Fecha para el listado de fechas
        $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        
        // //lo volvemos a convertir en arreglo para los encuentros
        // $fechas2 = array();
        // foreach ($fechas as $fecha) {
        //     $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        // }
        return view('grupo.fechas_grupo_competicion',compact('grupo','gestion','disciplina','fase','fechas'));

    }
    public function encuentros_grupo_competicion($id_grupo, $id_fase,$id_disc,$id_gestion){
        $gestion = Gestion::find($id_gestion);
        //dd($gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);

        //todas las fechas del grupo
        $fechasLista = DB::table('fechas')
            ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
            ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('fechas.*')->get();
        //se convierte en arreglo
        $fechasArreglo = array();
        foreach ($fechasLista as $fecha) {
            $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        }
        //obtenemos los objetos Fecha para el listado de fechas
        $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        
        //lo volvemos a convertir en arreglo para los encuentros
        $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        $centrosLista = Centro::all();
        $centros = array();
        foreach ($centrosLista as $centro) {
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
        //lista de encuentros del grupo
        $encuentros = DB::table('grupos')
                ->join('fechas_grupos','grupos.id_grupo','fechas_grupos.id_grupo')
                ->join('fechas','fechas_grupos.id_fecha','fechas.id_fecha')
                ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
                ->join('encuentro_seleccions','encuentros.id_encuentro','encuentro_seleccions.id_encuentro')
                ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                //->where('encuentros.id_fecha',$id_fecha)
                ->where('grupos.id_grupo','=',$id_grupo)
                ->select('encuentros.*')
                ->get();
        $lista_encuentros = array();
        foreach ($encuentros as $encuentro) {
            $lista_encuentros[] = $encuentro->id_encuentro;
        }
      
        $jugadores_participaron = DB::table('jugadores')
            ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
            ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
            ->join('encuentro_seleccions','selecciones.id_seleccion','encuentro_seleccions.id_seleccion')
            ->whereIn('encuentro_seleccions.id_encuentro',$lista_encuentros)
            //->where('club_participaciones.id_disc',$id_disc)
            ->select('jugadores.*')->get();
        $participantes = DB::table('jugadores')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                ->join('clubs','club_participaciones.id_club','clubs.id_club')
                ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('grupo_seleccions.id_grupo',$id_grupo)
                ->select('jugadores.*','clubs.*','selecciones.id_seleccion')->get();

        if($disciplina->es_raquetaFronton($id_disc)==2){
            return view('grupo.encuentros_grupo_competicion_set',compact('participantes','grupo','gestion','disciplina','fase','fechas2','fechas','centros'));
        }elseif($disciplina->es_ajedrez($id_disc)==1){
            return view('grupo.encuentros_grupo_competicion_ajedrez',compact('participantes','grupo','gestion','disciplina','fase','fechas2','fechas','centros'));
        }else{
            return view('grupo.encuentros_grupo_competicion',compact('participantes','grupo','gestion','disciplina','fase','fechas2','fechas','centros'));
        }
    }

    public function destroy($id){
        $grupo = Grupo::find($id);
        $grupo->delete();
         return redirect()->back(); 
    }
    public function store_club(Request $request){
        
        $clubs =$request->get('id_club');
        $disc = Disciplina::find($request->get('id_disciplina'));
        foreach ($clubs as $club) {
            $datos = new grupo_club_participacion;
            $datos->id_grupo = $request->get('id_grupo');

            $id_club_part = DB::table('club_participaciones')
                                ->where('club_participaciones.id_gestion','=',$request->get('id_gestion'))
                                ->where('club_participaciones.id_disc','=',$request->get('id_disciplina'))
                                ->where('club_participaciones.id_club','=',$club)->get()->last()->id_club_part;

            $datos->id_club_part = $id_club_part;
            $datos->save();
        }

        foreach ($clubs as $club) {
            if ($disc->es_set($request->get('id_disciplina')) || $disc->es_raquetaFronton($request->get('id_disciplina'))== 1) {
                $datos = new Tabla_Posiciones_Set;
                $datos->id_fase = $request->get('id_fase');
    
                $id_club_part = DB::table('club_participaciones')
                                    ->where('club_participaciones.id_gestion','=',$request->get('id_gestion'))
                                    ->where('club_participaciones.id_disc','=',$request->get('id_disciplina'))
                                    ->where('club_participaciones.id_club','=',$club)->get()->last()->id_club_part;
    
                $datos->id_club_part = $id_club_part;
                $datos->save();
            } else {
                $datos = new Tabla_Posicion;
                $datos->id_fase = $request->get('id_fase');
    
                $id_club_part = DB::table('club_participaciones')
                                    ->where('club_participaciones.id_gestion','=',$request->get('id_gestion'))
                                    ->where('club_participaciones.id_disc','=',$request->get('id_disciplina'))
                                    ->where('club_participaciones.id_club','=',$club)->get()->last()->id_club_part;
    
                $datos->id_club_part = $id_club_part;
                $datos->save();
            }
            
            
        }
        return redirect()->back();
    }
    public function store_jugador(Request $request){
        $this->validate($request, [
            'id_jugador' => 'required'
        ],[
            'id_jugador.required'=>'Debe seleccionar por lo menos una opcion.']
        ); 
        
        $jugadores =$request->get('id_jugador');
        $disc = Disciplina::find($request->get('id_disciplina'));
        foreach ($jugadores as $jug) {
            $datos = new Grupo_Seleccion;
            $datos->id_grupo = $request->get('id_grupo');

            /* $id_club_part = DB::table('club_participaciones')
                                ->where('club_participaciones.id_gestion','=',$request->get('id_gestion'))
                                ->where('club_participaciones.id_disc','=',$request->get('id_disciplina'))
                                ->where('club_participaciones.id_club','=',$club)->get()->last()->id_club_part; */

            $datos->id_seleccion = $jug;
            $datos->save();
        }

        foreach ($jugadores as $jug) {
                $datos = new Tabla_Posicion_Jugador;
                $datos->id_fase = $request->get('id_fase');
    
                /* $id_club_part = DB::table('club_participaciones')
                                    ->where('club_participaciones.id_gestion','=',$request->get('id_gestion'))
                                    ->where('club_participaciones.id_disc','=',$request->get('id_disciplina'))
                                    ->where('club_participaciones.id_club','=',$club)->get()->last()->id_club_part; */
    
                $datos->id_seleccion = $jug;
                $datos->id_disc = $request->get('id_disciplina');
                $datos->save();
        }
        return redirect()->back();
    }
    public function eliminar_club($id_grupo,$id_club_part,$id_fase){
        $id_disc = Club_Participacion::find($id_club_part)->id_disc;
        $disc = Disciplina::find($id_disc);
        $grupo_club_participacion = DB::table('grupo_club_participaciones')
            ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->where('grupo_club_participaciones.id_club_part','=',$id_club_part)->delete();

        if ($disc->es_set($id_disc)) {
            $Tabla_posicions_set = DB::table('tabla_posiciones_sets')
            ->where('tabla_posiciones_sets.id_fase','=',$id_fase)
            ->where('tabla_posiciones_sets.id_club_part','=',$id_club_part)->delete();
        } else {
            $Tabla_posicion = DB::table('tabla_posicions')
            ->where('tabla_posicions.id_fase','=',$id_fase)
            ->where('tabla_posicions.id_club_part','=',$id_club_part)->delete();
        }
        
        
        //$grupo_club_participacion->delete();
         return redirect()->back();
    }
    public function eliminar_jugador($id_grupo,$id_seleccion,$id_fase){
        $id_disc = Seleccion::find($id_seleccion)->club_participacion->id_disc;
        $disc = Disciplina::find($id_disc);

        $grupo_seleccion = DB::table('grupo_seleccions')
            ->where('grupo_seleccions.id_grupo','=',$id_grupo)
            ->where('grupo_seleccions.id_seleccion','=',$id_seleccion)->delete();

        if ($disc->es_set($id_disc)) {
            $Tabla_posicions_set = DB::table('tabla_posiciones_sets')
            ->where('tabla_posiciones_sets.id_fase','=',$id_fase)
            ->where('tabla_posiciones_sets.id_club_part','=',$id_seleccion)->delete();
        } else {
            $Tabla_posicion = DB::table('tabla_posicion_jugadors')
            ->where('tabla_posicion_jugadors.id_fase','=',$id_fase)
            ->where('tabla_posicion_jugadors.id_seleccion','=',$id_seleccion)->delete();
        }
        
        
        //$grupo_club_participacion->delete();
         return redirect()->back();
    }
    
}

