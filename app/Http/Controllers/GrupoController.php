<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Club;
use App\Models\Fase;
use App\Models\Fase_Tipo;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index()
    { 
    }
    public function create2($id_fase)
    {   
        //return dd('hola');
        return view('grupo.reg_grupo_beta')->with('id_fase',$id_fase);
    }
    public function store(Request $request){
    	//return dd($request);
    	$id_fase = $request->get('id_fase');
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
            return redirect()->route('grupo.mostrar_grupos',$id_fase);
    	
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
    public function listar_clubs($id_grupo){
        $id_gestion = DB::table('grupos')
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
            ->get()->id_disciplina;

        $clubsDisponibles = DB::table('clubs')
            ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
            //->where('club_participaciones.id_gestion','=',$id_gestion[0])
            //->where('club_participaciones.id_disc','=',$id_disciplina->id_disciplina)
            ->get();
        $clubs = DB::table('grupos')
            ->join('grupo_club_participaciones','grupos.id_grupo','=','grupo_club_participaciones.id_grupo')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupos.id_grupo','=',$id_grupo)
            ->select('clubs.*')
            ->get();

return dd($id_disciplina);
        //return view('grupo.listarClubs')->with('clubs',$clubs)->with('clubsDisponibles',$clubsDisponibles);
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
    public function store_club(){

    }
}

