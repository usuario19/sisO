<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Gestion;
use App\Models\Club;
use App\Models\Fase;
use App\Models\Disciplina;
use App\Models\Fase_Tipo;
use App\Models\Fecha;
use App\Models\Grupo_Club_Participacion;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index()
    { 
    }
    public function create2($id_fase,$id_gestion,$id_disc)
    {   
        $gestion = Gestion::find($id_gestion);
        return view('grupo.reg_grupo_beta')->with('id_fase',$id_fase)->with('gestion',$gestion)->with('id_disc',$id_disc);
    }
    public function store(Request $request){
    	//return dd($request);
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
                case 3:
                    for ($i=2; $i < 5; $i++) { 
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
    public function mostrar_grupos($id_fase)
    {
        $grupos = Grupo::where('grupos.id_fase','=',$id_fase)->get();
        $fase = Fase::where('id_fase','=',$id_fase)->first();
        /**$fase = DB::table('fases')
                ->where('fases.id_fase','=',$id_fase)
                ->get();**/
        //return redirect()->route('fases.listar_grupos')->with('id_fase',$id_fase);
        return view('grupo.listar_grupos')->with('fase',$fase)->with('grupos',$grupos);
    }
    public function listar_clubs($id_grupo,$id_gestion,$id_disc,$id_fase){

        /**$id_gestion = DB::table('grupos')
            ->join('fases','grupos.id_fase','=','fases.id_fase')
            ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('participaciones.id_gestion')
            ->get()->last()->id_gestion;
        $id_disciplina = DB::table('grupos')
            ->join('fases','grupos.id_fase','=','fases.id_fase')
            ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('participaciones.id_disciplina')
            ->get()->last()->id_disciplina;**/

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
        //return dd($fechas->toArray());
        $encuentros = DB::table('encuentros')
                    ->join('encuentro_club_participaciones','encuentros.id_encuentro','=','encuentro_club_participaciones.id_encuentro')
                    ->groupBy('id_encuentro')
                    ->get();
        return view('grupo.listarClubs')->with('clubs',$clubs)->with('clubsDisponibles',$clubsDisponibles)->with('grupo',$grupo)->with('gestion',$gestion)->with('disciplina',$disciplina)->with('fase',$fase)->with('fechas',$fechas)->with('fechas2',$fechas2)->with('clubsParaEncuentro',$clubsParaEncuentro)->with('encuentros',$encuentros);
        //return dd($fechas);
        
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
         return redirect()->back(); 
    }
    public function crearGrupos(Request $request)
    {
        $cantGrupos = $request->get('cant_grupos');
        $id_fase = $request->get('id_fase');
       //$clubs = 
       // dd("hola");
        //return view('grupo.registrar_grupos')->with('cantGrupos',$cantGrupos)->with('id_fase',$id_fase)->with('clubs',$clubs);
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

