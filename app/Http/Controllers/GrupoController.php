<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
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
    				break;
    		}
    	$grupos = DB::table('grupos')
    					->where('grupos.id_fase','=',$id_fase)
    					->get();
    	$fase = Fase::where('id_fase','=',$id_fase)->find(1);
    	/**$fase = DB::table('fases')
    			->where('fases.id_fase','=',$id_fase)
    			->get();**/

    	return view('grupo.listar_grupos')->with('fase',$fase)->with('grupos',$grupos);
    }
    public function show($id)
    {
        //
    }
    
    public function mostrarGestion()
    {
       
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
        //
    }
    public function crearGrupos(Request $request)
    {
        $cantGrupos = $request->get('cant_grupos');
        $id_fase = $request->get('id_fase');
       //$clubs = 
        dd("hola");
        //return view('grupo.registrar_grupos')->with('cantGrupos',$cantGrupos)->with('id_fase',$id_fase)->with('clubs',$clubs);
    }
}

