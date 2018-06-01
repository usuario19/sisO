<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Grupo;
use App\Models\Fase;
use App\Models\Fase_Tipo;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function index()
    { 
    }
    public function create($id_fase)
    {   
        return view('grupo.reg_grupo_beta')->with('id_fase',$id_fase);
    }
    public function store(Request $request)
    {

 
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
        return view('grupo.registrar_grupos')->with('cantGrupos',$cantGrupos)->with('id_fase',$id_fase)->with('clubs',$clubs);
    }
}

