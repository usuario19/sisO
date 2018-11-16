<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecha;
use App\Models\Fase;
use App\Models\Gestion;
use App\Models\Disciplina;

class FechaController extends Controller{
    public function store(request $request){
    	$fecha = new Fecha;
		$fecha->nombre_fecha = $request->get('nombre_fecha');
		$fecha->id_fase = $request->get('id_fase');
		$fecha->save();

		$datos = Fecha::all();
		return response()->json(
			$datos->toArray()
		);

		//return redirect()->back();
    }
    public function listar_fechas($id_fase,$id_gestion,$id_disc){
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
    	$fechas = Fecha::where('id_fase','=',$id_fase)->get();
    	return view('fechas.listar_fechas')->with('fechas',$fechas)->with('fase',$fase)->with('gestion',$gestion)->with('disciplina',$disciplina);
    }
    public function destroy($id_fecha){
    	$fecha = Fecha::find($id_fecha);
    	$fecha->delete();
    	return redirect()->back();
    }
}
