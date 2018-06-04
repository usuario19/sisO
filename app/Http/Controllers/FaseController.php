<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fase;
use App\Models\Grupo;
use App\Models\Participacion;
use App\Models\Fase_Tipo;
use Illuminate\Support\Facades\DB;

class FaseController extends Controller
{
    public function index()
    {   
        
    }
    public function create($id_disc,$id_gestion)
    {  
        $tipos = DB::table('tipos')->get();
        return view('fases.reg_fase')->with('tipos', $tipos)->with('id_disc',$id_disc)->with('id_gestion',$id_gestion);
    }
    public function store(Request $request)
    {
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_participacion = DB::table('participaciones')
                            ->where('participaciones.id_disciplina',$request->id_disc)
                            ->where('participaciones.id_gestion',$request->id_gestion)
                            ->select('participaciones.id_participacion')
                            ->get()->toArray();
        $fases = new Fase;
        //return dd($request->id_disc);
        //return dd($id_participacion);
        $fases->nombre_fase = $request->get('nombre');
        $fases->id_participacion = $id_participacion[0]->{'id_participacion'};
        $fases->save();

        $fase_tipos = new Fase_Tipo;
        $fase_tipos->id_fase = Fase::all()->last()->id_fase;
        $fase_tipos->id_tipo = $request->get('tipo');
        $fase_tipos->save();
        
        return redirect()->route('disciplina.fases',array('id_disc'=>$id_disc,'id_gestion'=>$id_gestion));
    }
    public function show($id)
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
    public function listar_grupos($id_fase){
        $grupos = DB::table('grupos')
                ->where('grupos.id_fase',$id_fase)
                ->get();
        $fase = Fase::where('id_fase','=',$id_fase)->find(1);
        return view('grupo.listar_grupos')->with('grupos',$grupos)->with('fase',$fase);
    }
}

