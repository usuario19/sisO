<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecha;

class FechaController extends Controller{
    public function store(request $request){

    }
    public function listar_fechas($id_fase){
    	$fechas = Fecha::where('id_fase','=',$id_fase)->get();
    	return view('fechas.listar_fechas')->with('fechas',$fechas);
    }
}
