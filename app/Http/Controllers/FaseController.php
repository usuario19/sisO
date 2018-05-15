<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fase;
use App\Models\Fase_Tipo;
use Illuminate\Support\Facades\DB;

class FaseController extends Controller
{
    public function index()
    { 
    }
    public function create()
    {
        $tipos = DB::table('tipos')->get();
        return view('fases.reg_fase')->with('tipos', $tipos);
    }
    public function store(Request $request)
    {
    	//return dd($request);
        $fases = new Fase;
        $fases->nombre_fase = $request->get('nombre');
        $fases->save();
        //return dd($fases);
        $fase_tipos = new Fase_Tipo;
        $fase_tipos->id_fase = Fase::all()->last()->id_fase;;
        $fase_tipos->id_tipo = $request->get('tipo');
        $fase_tipos->save();

        return redirect()->route('fase.create');
 
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
}

