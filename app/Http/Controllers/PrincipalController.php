<?php

namespace App\Http\Controllers;
use App\Models\Gestion;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\Jugador_Club;
use App\Models\Disciplina;
use App\Models\Club_Participacion;
use App\Models\Participacion;

class PrincipalController extends Controller
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
    public function gestion_info($id){
        $dato = Gestion::find($id);
        return view('principal.gestion_info')->with('gestion',$dato);
    }

    public function club_info($id){
        $dato = Club::find($id);
        $jug_clubs = Jugador_Club::where('id_club', $id)->paginate(15);

        return view('principal.club_info')->with('club',$dato)->with('jug_clubs',$jug_clubs);
    }

    public function listar_disciplinas()
    {
        $dato = Disciplina::all();
        return view('principal.listar_disciplinas')->with('disciplinas',$dato);
    }
    public function disciplina_info($id){
        $dato = Disciplina::find($id);

        return view('principal.disciplina_info')->with('disciplina',$dato);
    }
    public function consultar_resultados(){
       /*  $dato = Disciplina::find($id); */
       
       $datos = Gestion::all();
        return view('principal.consultar_resultados')->with('gestiones',$datos);
    }

    public function consultar_partidos(){
        /*  $dato = Disciplina::find($id); */
        $datos = Gestion::where('estado_gestion',1)->get();
        return view('principal.consultar_partidos')->with('gestiones',$datos);
     }

     public function noticias(){
        /*  $dato = Disciplina::find($id); */
 
         return view('principal.noticias');
     }
     public function obtener_gestiones()
    {
        //
        $gestiones = [];
        $datos = Gestion::all();
        array_push ($gestiones,['id_gestion'=>0 , 'nombre_gestion'=>'Selecciona la gestion']);
        foreach($datos as $dato){
                array_push( $gestiones,['id_gestion'=>$dato->id_gestion,'nombre_gestion'=> $dato->nombre_gestion]);
        }

        return response()->json($gestiones);

    }
    public function obtener_disciplinas(Request $request)
    {
        //
        $id_gestion = $request->id_gestion;
        $datos = Participacion::where('id_gestion',$id_gestion)->get();
        $disciplinas =[];
        
        foreach($datos as $dato){
            $categoria = ($dato->disciplina->categoria)=='1' ? "Mujeres" : (($dato->disciplina->categoria)=='2' ? "Hombres" : "Mixto" );
            array_push( $disciplinas,['id_participacion'=>$dato->id_participacion,'nombre_disc'=> $dato->disciplina->nombre_disc." ".$categoria]);
        }

        return response()->json($disciplinas);

    }

    /* public function obtener_gestiones_activas()
    {
        //
        $datos = Gestion::all();
        array_push ($gestiones,['id_gestion'=>0 , 'nombre_gestion'=>'Selecciona la gestion']);
        foreach($datos as $dato){
            if($dato->estado_gestion == 1)
                array_push( $gestiones,['id_gestion'=>$inscripcion->id_gestion,'nombre_gestion'=> $inscripcion->gestion->nombre_gestion]);
        }

        return response()->json($gestiones);

    } */
}
