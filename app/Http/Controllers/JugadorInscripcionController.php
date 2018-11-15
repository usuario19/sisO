<?php

namespace App\Http\Controllers;
use App\Models\Jugador_Inscripcion;
use Flash;

use Illuminate\Http\Request;

class JugadorInscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,[
            'id_inscripcion'=>'required',
            'id_jugadores'=>'required', 
            ],[
                'id_jugadores.required'=>'Debe seleccionar por lo menos un jugador.']);
        $id_inscripcion = $request->id_inscripcion;
        $ids = $request->id_jugadores;
        /* $jugs = count($ids);
        dd($ids);
        for($i=0;$i<(count($jugs));$i++){ */
        foreach ($ids as $id) {
            # code...
            $jug_insc = new Jugador_Inscripcion;
            $jug_insc->id_inscripcion = $id_inscripcion;
            $jug_insc->id_jugador =$id;
            $jug_insc->save();

        }
        flash('Se habilitaron los jugadores para la gestion actual.')->success()->important();
        return redirect()->back(); 
        /* dd($request->id); */
       /*  $datos = new Jugador_Inscripcion($request->all());
        $datos->save();
         
        return redirect()->route('jugador.index'); */
    }

    public function deshabilitar(Request $request)
    {
        $this->validate($request, [
                        'id_jugadores_ins' => 'required'
                    ],[
                        'id_jugadores_ins.required'=>'Debe seleccionar por lo menos un jugador.']); 

        $jug_insc = $request->id_jugadores_ins;
        foreach ($jug_insc as $id) {
            # code...
            $jug_inscrito = Jugador_Inscripcion::find($id);
            $jug_inscrito->delete();
        }
        flash('Se deshabilitaron los jugadores para la gestion actual.')->info()->important();

        return redirect()->back(); 
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
}
