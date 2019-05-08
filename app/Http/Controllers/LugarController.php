<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use App\Http\Requests\CentroRequest;
use App\Models\Galeria;
use App\Models\Gestion;
use App\Models\Ganador;
use App\Models\Participacion;
use App\Models\Jugador;
use Illuminate\Support\Facades\DB;
use App\Models\Reconocimiento;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Centro::All();
        return view('centro.index')->with('datos',$datos);
        
    }
    public function turismo_index()
    {
        return view('principal.turismo');
        
    }
    public function gastronomia_index()
    {
        return view('principal.gastronomia');
        
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
    public function store(CentroRequest $request)
    {
        /* $this->validate($request,[
            'nombre_centro'=>'required',
            'ubicacion_centro'=>'required',
        ]); */
        $datos = new Centro($request->all());
        $datos->save();
        flash('Se registro correctamente el centro.')->success()->important();
        /* $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');
        $ultimo_club = Club::all();
        $ultimo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo;
        $admin_club->estado_coordinador = 1;
        $admin_club->save(); */
        return redirect()->back();
    }

    public function store_imagen(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'id_gestion' => 'required',
            /* 'id_disc' => 'required', */
            'foto' => 'required',
            'comentario' => 'required',
            'fecha_publicacion' => 'required',
        ]);
        $datos = new Galeria($request->all());
        $datos->save();
        flash('Se registro correctamente el centro.')->success()->important();
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
        /**$datos = DB::table('disciplinas')
        ->where('id_disc',$id)
        ->get();

        foreach ($datos as $dato) {
            $disciplina = $dato;
        }
        return view('disciplina.editar_disc')->with('disciplina',$disciplina);*/

        $centro = Centro::find($id);
    
        return response()->json($centro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CentroRequest $request/* , $id */)
    {
        //
       /*  $this->validate($request,[
            'nombre_centro'=>'required',
            'ubicacion_centro'=>'required',
        ]); */
        $id = $request->get('id_centro');
        $datos = Centro::find($id);
        $datos->fill($request->all());
        $datos->save();
        flash('Se actualizo correctamente el centro.')->info()->important();
        /* $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');
        $ultimo_club = Club::all();
        $ultimo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo;
        $admin_club->estado_coordinador = 1;
        $admin_club->save(); */
        return redirect()->back();
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
        $dato= Centro::find($id);
        
        $dato->delete();
        flash('Se elimino correctamente.')->info()->important();
        
        return redirect()->back();
    }
    public function lista_imagenes()
    {
        $gestiones = Gestion::where('estado_gestion',1)->get() ;

        $datos = Galeria::All();
        return view('galeria.index')->with('datos',$datos)->with('gestiones',$gestiones);
        
    }
    public function eliminar_imagen($id)
    {
        //
        $dato= Galeria::find($id);
        
        $dato->delete();
        flash('Se elimino correctamente.')->info()->important();
        
        return redirect()->back();
    }

    public function evento_info($foto,$gestion){
        $dato = Galeria::where('id_gestion',$gestion)->where('id_disc',$foto)->get();
        /* $jug_clubs = Jugador_Club::where('id_club', $id)->paginate(15); */

        return view('principal.evento_info')->with('datos',$dato);
    }
    public function evento_informacion($foto,$gestion){
        $dato = Galeria::where('id_gestion',$gestion)->where('titulo',$foto)->get();
        /* $jug_clubs = Jugador_Club::where('id_club', $id)->paginate(15); */

        return view('principal.evento_informacion')->with('datos',$dato);
    }

    //---------------------------------------------------------
    public function medallero(){

        $ganadores=Participacion::all();

        return view('principal.medallero')->with('participacion',$ganadores);
    }

    public function medallero_club(){
        $ganadores=Ganador::all();

        return view('principal.medallero_club')->with('ganadores',$ganadores);
    }

    public function reconocimientos(){
        $ganadores=Reconocimiento::where('id_jugador',null)->get();
        $ganadores2=Reconocimiento::where('id_jugador','!=',null)->get();

        return view('principal.lista_reconocimientos')->with('ganadores',$ganadores)->with('ganadores2',$ganadores2);
    }
    
}
