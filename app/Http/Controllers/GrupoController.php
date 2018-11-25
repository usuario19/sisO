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
        $fechas = Fecha::where('id_fase','=',$id_fase)->get();

        $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
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
        return view('grupo.listarClubs')->with('clubs',$clubs)->with('clubsDisponibles',$clubsDisponibles)->with('grupo',$grupo)->with('gestion',$gestion)->with('disciplina',$disciplina)->with('fase',$fase)->with('fechas',$fechas)->with('fechas2',$fechas2)->with('clubsParaEncuentro',$clubsParaEncuentro)->with('encuentros',$encuentros);
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
        // $clubsParticipantes = DB::table('grupo_club_participaciones')
        //     ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
        //     ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
        //     ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
        //     ->select('clubs.*')
        //     ->get()->toArray();
        // $clubsParaEncuentro = DB::table('grupo_club_participaciones')
        //     ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
        //     ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
        //     ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
        //     ->select('clubs.*')
        //     ->get();
             
        //$clubsParaEncuentro = array();
        // foreach ($clubsParticipantes as $club) {
        //     $clubsParaEncuentro[$club->id_club] = ($club->nombre_club);
        // }
        // $clubsDisponibles = DB::table('clubs')
        //     ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
        //     ->where('club_participaciones.id_gestion','=',$id_gestion)
        //     ->where('club_participaciones.id_disc','=',$id_disc)
        //     ->whereNotIn('club_participaciones.id_club_part',$lista)
        //     ->get();
        // $clubs = DB::table('clubs')
        //     ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')
        //     ->where('participaciones.id_disciplina','=',$id_disc)
        //     ->get();
        // return $fases; 
        //return $clubsParaEncuentro;

        // $clubsParaEncuentro = array();
        // foreach ($clubsParticipantes as $club) {
        //     $clubsParaEncuentro[$club->id_club] = ($club->nombre_club);
        // }
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
        $participantes = DB::table('jugadores')
                ->join('jugador_participaciones','jugadores.id_jugador','jugador_participaciones.id_jugador')
                ->join('participaciones','jugador_participaciones.id_participacion','participaciones.id_participacion')
                ->where('participaciones.id_gestion',$id_gestion)
                ->where('participaciones.id_disciplina',$id_disc)
                ->select('jugadores.*')->get();

                //return view('grupo.listar_competiciones',compact('participantes','clubs','clubsDisponibles','grupo','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro','encuentros'));
                return view('grupo.listar_competiciones',compact('participantes','clubs','clubsDisponibles','grupo','gestion','disciplina','fase','fechas','fechas2','encuentros'));
    }
    public function edit($id){
    }

    public function update(Request $request, $id){
        //
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

