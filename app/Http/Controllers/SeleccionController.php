<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club_participacion;
use App\Models\Jugador_Club;
use App\Models\Admin_Club;
use App\Models\Jugador_Inscripcion;
use App\Models\Disciplina;
use App\Models\Inscripcion;
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
    public function create(Request $request)
    {
        //
        $datos = Club_participacion::where('id_club_part',$request->id_disc)->get();
        
        $id_club = $datos[0]->id_club;
        $id_gestion = $datos[0]->id_gestion;
        $id_disc = $datos[0]->id_disc;
        $id_adminClub =Admin_Club::where('id_club',$id_club)->select('id_adminClub')->get();

        $inscripcion = Inscripcion::where('id_adminClub',$id_adminClub->first()->id_adminClub)->where('id_gestion',$id_gestion)->select('id_inscripcion')->get();
        //dd($jugadores);
        //HABILITADOS en la seleccion...................................
        $jugadores_habilitados = Seleccion::where('id_club_part',$request->id_disc)->get();
        $habilitados = array();
        $i=0;
        /* foreach ($jugadores_habilitados as $habilitado) 
        {
            $habilitados[$i] = $habilitado->id_jug_club;
            $i++;
        } */
        foreach ($jugadores_habilitados as $habilitado) 
        {
            $habilitados[$i] = $habilitado->jugador_club->id_jugador;
            $i++;
        }
        //dd($habilitados);
        //NO HABILITADOS
        $jugadores = Jugador_Inscripcion::where('id_inscripcion',$inscripcion->first()->id_inscripcion)
                        ->whereNotIn('id_jugador',$habilitados)
                        ->get();
        /* $jugadores = Jugador_Club::where('id_club',$id_club)
                        ->whereNotIn('id_jug_club',$habilitados)
                        ->get(); *///los ids de id_jug_club
        
        $view = view('seleccion.plantilla_reg_seleccion_ajax')->with('datos',$datos)->with('jugadores',$jugadores)->with('habilitados',$jugadores_habilitados)->render();
        return response()->json(array('success' => true, 'html'=>$view));

        //return view('seleccion.plantilla_reg_seleccion_ajax')->with('datos',$datos)->with('jugadores',$jugadores)->with('habilitados',$jugadores_habilitados);
    }
    
    public function create_ajax($id)
    {
        //
        $datos = Club_participacion::where('id_club_part',$id)->get();

        
        
        $id_club = $datos[0]->id_club;
        $id_gestion = $datos[0]->id_gestion;
        $id_disc = $datos[0]->id_disc;

        $ids = Club_participacion::where('id_club', $id_club)->where('id_gestion',$id_gestion)->get();
        $select = [];
        foreach ($ids as $id_one) {
            # code...
            
            $categoria = $id_one->disciplina->categoria == (1) ? 'Mujeres' : ($id_one->disciplina->categoria == (2) ? 'Hombres' : 'Mixto' );
            $select[$id_one->id_club_part] = $id_one->disciplina->nombre_disc." - ".$categoria ;

        }
       // dd($select);


        
        return view('seleccion.reg_seleccion_ajax')->with('datos',$datos)->with('select',$select)->with('id',$id);
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
            #. code...
            $seleccion = new Seleccion;
            $seleccion->id_club_part = $id_club_part;
            $seleccion->id_jug_club =$id;
            $seleccion->save();

        }
        flash('Se habilitaron los jugadores.')->success()->important();
        return back()->withInput(['id_disc'=>$id_club_part]); 
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
        $id_club_part = $request->id_club_part;

        foreach ($selecciones as $id) {
            # code...
            $seleccion =Seleccion::find($id);
            $seleccion->delete();
        }
        flash('Se deshabilitaron los jugadores.')->info()->important();
        return back()->withInput(['id_disc'=>$id_club_part]); 
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
