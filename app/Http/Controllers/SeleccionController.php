<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club_participacion;
use App\Models\Jugador_Club;
use App\Models\Disciplina;
use App\Models\Seleccion;
use App\Http\Requests\SeleccionRequest;
use Illuminate\Support\Facades\DB;

class SeleccionController extends Controller
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
    public function create($id)
    {
        //
        $datos = Club_participacion::where('id_club_part',$id)->get();
        $id_club = $datos[0]->id_club;
        $id_gestion = $datos[0]->id_gestion;
        $id_disc = $datos[0]->id_disc;
        //dd($jugadores);
        //HABILITADOS...................................
        $jugadores_habilitados = Seleccion::where('id_club_part',$id)->get();
        $habilitados = array();
        $i=0;
        foreach ($jugadores_habilitados as $habilitado) 
        {
            $habilitados[$i] = $habilitado->id_jug_club;
            $i++;
        }

        //NO HABILITADOS
        $jugadores = Jugador_Club::where('id_club',$id_club)
                        ->whereNotIn('id_jug_club',$habilitados)
                        ->get();//los ids de id_jug_club
        
        

        return view('seleccion.reg_seleccion')->with('datos',$datos)->with('jugadores',$jugadores)->with('habilitados',$jugadores_habilitados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeleccionRequest $request)
    {
        //
        $id_club_part = $request->id_club_part;
        $ids = $request->id_jug_club;
        //dd($id_club_part, $id_jug_club);
        //dd($id_jug_club);
        foreach ($ids as $id) {
            # code...
            $seleccion = new Seleccion;
            $seleccion->id_club_part = $id_club_part;
            $seleccion->id_jug_club =$id;
            $seleccion->save();

        }

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

    public function deshabilitar(Request $request)
    {
        $this->validate($request, [
                        'id_seleccion' => 'required'
                    ],[
                        'id_seleccion.required'=>'Debe seleccionar por lo menos un jugador.']); 

        $selecciones = $request->id_seleccion;
        foreach ($selecciones as $id) {
            # code...
            $seleccion =Seleccion::find($id);
            $seleccion->delete();
        }
        return redirect()->back(); 
    }

    public function ver_seleccion($id_jugador, $id_club)
    {

        $jugador = Jugador_Club::where('id_club',$id_club)
                        ->where('id_jugador',$id_jugador)
                        ->get();

        $selecciones = Seleccion::where('id_jug_club',$jugador[0]->id_jug_club)->get();
        //dd($jugador[0]->id_jug_club);
        return view('seleccion.ver_seleccion')->with('selecciones',$selecciones)->with('jugador',$jugador); 
    }

}
