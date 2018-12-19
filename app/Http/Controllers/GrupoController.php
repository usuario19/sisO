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
        
        $fechasLista = DB::table('fechas')
                    ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
                    ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
                    ->where('grupos.id_grupo','=',$id_grupo)
                    ->select('fechas.*')->get();
       
        $fechasArreglo = array();
        foreach ($fechasLista as $fecha) {
            $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        }
        
        //$fechas = Fecha::where('id_fase',$id_fase)->get();
        //return dd($id_fecha);
        $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        //return dd($fechas);
        //$fechas = Fecha::find($id_fecha)->get();
        //$fechas = Fecha::where('id_fecha',$id_fecha)->get();
        //return dd($fechas);
        $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        $centrosLista = Centro::all();
        $centros = array();
        foreach ($centrosLista as $centro) {
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
        //return dd($centros);
        //$fechas = DB::table('fechas');
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
        $encuentros = Encuentro::all();
        return view('grupo.listarClubs',compact('encuentros','clubs','clubsDisponibles','grupo','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro','centros'));
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

        $fechasLista = DB::table('fechas')
            ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
            ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('fechas.*')->get();
        $fechasArreglo = array();
        foreach ($fechasLista as $fecha) {
        $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        }
        $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        $fechas2 = array();
        foreach ($fechas as $fecha) {
        $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        
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
        //return dd($lista_encuentros);
        // $jugadores = $participantes = DB::table('jugadores')
        //     ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
        //     ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
        //     ->join('encuentro_seleccion','selecciones.id_seleccion','encuentro_seleccion.id_seleccion')
        //     ->whereIn('encuentro_seleccion.id_encuentro',$lista_encuentros)
        //     //->where('club_participaciones.id_disc',$id_disc)
        //     ->select('jugadores.*')->get();
        $participantes = DB::table('jugadores')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('grupo_club_participaciones.id_grupo',$id_grupo)
                ->select('jugadores.*')->get();
                
                return view('grupo.listar_competiciones',compact('participantes','clubs','clubsDisponibles','grupo','gestion','disciplina','fase','fechas','fechas2','encuentros','centros'));
    }

    public function destroy($id){
        $grupo = Grupo::find($id);
        $grupo->delete();
         return redirect()->back(); 
    }
    public function store_club(Request $request){
        
        $clubs =$request->get('id_club');
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

        return redirect()->back();
    }
    public function eliminar_club($id_grupo,$id_club_part){

        $grupo_club_participacion = DB::table('grupo_club_participaciones')
            ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->where('grupo_club_participaciones.id_club_part','=',$id_club_part)->delete();
        //$grupo_club_participacion->delete();
         return redirect()->back();
    }
    
}

