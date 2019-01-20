<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Models\Participacion;
use App\Models\Aviso;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $avisos = Aviso::all()->sortByDesc('fecha_ini_aviso');
        return view("avisos.index")->with('avisos',$avisos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gestiones = Gestion::where('estado_gestion',1)->get() ;

        return view("avisos.aviso_crear")->with('gestiones',$gestiones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $texto = $request->contenido;
        echo $texto;

        /* $datos = new Aviso($request->all());
        $datos->save();
        flash('Se registro exitosamente el nuevo aviso.')->success()->important();
            return redirect()->route('aviso.index'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function consultar_participacion($id){
        $participaciones = Participacion::where('id_gestion', $id)->get();
        $datos = [];
        if(count($participaciones)>0)
        {
            array_push ($datos,['id_disc'=>0 , 'nombre_disc'=>'Seleccione']);

            foreach($participaciones as $item)
            {
                array_push ($datos,['id_disc'=>$item->id_disc , 'nombre_disc'=>$item->disciplina->nombre_disc." ".$item->disciplina->nombre_categoria($item->disciplina->categoria)]);
            }
        }

        return response()->json($datos);
    }
}
