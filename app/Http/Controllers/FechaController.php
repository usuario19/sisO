<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecha;

class FechaController extends Controller{
    public function store(request $request){
    	$fecha = new Fecha;
		$fecha->nombre_fecha = $request->get('nombre_fecha');
		$fecha->id_fase = $request->get('id_fase');
		$fecha->save();
		return redirect()->back();
    }
    public function listar_fechas($id_fase){
    	$fechas = Fecha::where('id_fase','=',$id_fase)->get();
    	return view('fechas.listar_fechas')->with('fechas',$fechas)->with('id_fase',$id_fase);
    }
    public function destroy($id_fecha){
    	$fecha = Fecha::find($id_fecha);
    	$fecha->delete();
    	return redirect()->back();
    }
}
