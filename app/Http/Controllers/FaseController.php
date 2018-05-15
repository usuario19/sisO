<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Models\Disciplina;
use App\Models\Participacion;
use Illuminate\Support\Facades\DB;


class FaseController extends Controller
{
    public function index()
    {
        
    }
    public function create()
    {
        $tipos = DB::table('tipos')->get();
        return view('fase.reg_fase')->with('tipos', $tipos);
    }
    public function store(Request $request)
    {
        $fase = new Fase;
        $fase->nombre_fase = $request->get('nombre');
        $gestion->save();

        $fase_tipo = new Fase_Tipo;
        $fase_tipo->id_fase = Fase::all()->last()->id_fase;;
        $fase_tipo->id_tipo = $request->get('tipo');
        $fase_tipo->save();

        return redirect()->route('fase.index');
 
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

