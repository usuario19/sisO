<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fase;
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
                            ->where('participaciones.id_disciplina',$id_disc)
                            ->where('participaciones.id_gestion',$id_gestion)
                            ->select('participaciones.id_participacion')
                            ->get()->toArray();
        $fases = new Fase;
        //return dd($id_participacion[0]->{'id_participacion'});
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
    public function fases($id_disc){
        $fases = DB::table('fases')
                ->join('fase_tipos','fases.id_fase','=','fase_tipos.id_fase')
                ->join('tipos','tipos.id_tipo','=','fase_tipos.id_tipo')
                ->select('fase.*','tipo.*')
                ->get();
        return dd($fases);
        //return view('fases.list_fase')->with('fases', $fases);
    }
}

