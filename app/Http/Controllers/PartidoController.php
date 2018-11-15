<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin_Club;
use App\Models\Club_Participacion;
use App\Models\Inscripcion;
use App\Models\Participacion;


class PartidoController extends Controller
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

    public function ver_los_partidos()
    {
        $coordinador = Auth::user()->id_administrador;
        $clubs = Admin_Club::where('id_administrador',$coordinador)->get();
        $mis_clubs = ['0'=>'Selecciona el Club'];
        $gestiones =[];
        $disciplinas =[];
        foreach($clubs as $club){
            $mis_clubs[$club->id_club] = $club->club->nombre_club; 
        }

        return view('partido.listar_partidos')->with('mis_clubs',$mis_clubs)->with('gestiones',$gestiones)->with('disciplinas',$disciplinas);
    }

    public function obtener_gestiones(Request $request)
    {
        //
        $id_club = $request->id_club;
        $id_admin_club = Admin_Club::where('id_club',$id_club)->get();
        $inscripciones = Inscripcion::where('id_adminClub',$id_admin_club->first()->id_adminClub)->get();
        $gestiones =[];
        array_push ($gestiones,['id_gestion'=>0 , 'nombre_gestion'=>'Selecciona la gestion']);
        foreach($inscripciones as $inscripcion){
            if($inscripcion->gestion->estado_gestion == 1)
                array_push( $gestiones,['id_gestion'=>$inscripcion->id_gestion,'nombre_gestion'=> $inscripcion->gestion->nombre_gestion]);
        }

        return response()->json($gestiones);

    }
    public function obtener_disciplinas(Request $request)
    {
        //
        $id_club = $request->id_club;
        $id_gestion = $request->id_gestion;
        
        $club_participacion = Club_Participacion::where('id_club',$id_club)->where('id_gestion',$id_gestion)->get();
        $disciplinas =[];
        
        foreach($club_participacion as $dato){
            $categoria = ($dato->disciplina->categoria)=='1' ? "Mujeres" : (($dato->disciplina->categoria)=='2' ? "Hombres" : "Mixto" );
            array_push( $disciplinas,['id_club_part'=>$dato->id_club_part,'nombre_disc'=> $dato->disciplina->nombre_disc." ".$categoria]);
        }

        return response()->json($disciplinas);

    }
    public function obtener_clubs_encuentros(Request $request)
    {
        //
        $this->validate($request, [
            'id_club' =>'required',
            'id_gestion' =>'required',
            'id_disc' =>'required',
        ],[
            'id_club.required'=>'El campo club es necesario realizar esta consulta.',
            'id_gestion.required'=>'El campo gestion es necesario realizar esta consulta.',
            'id_disc.required'=>'El campo disciplina es necesario realizar esta consulta.',
        ]);
        
        $id_club = $request->id_club;
        $id_gestion = $request->id_gestion;
        $id_club_part = $request->id_disc;
        
        $club_participacion = Club_Participacion::where('id_club_part',$id_club_part)->get();
        $id_disc = $club_participacion->first()->disciplina->id_disc;

        $participacion = Participacion::where('id_gestion',$id_gestion)->where('id_disciplina',$id_disc)->get();
        $id_part = $participacion->first()->id_participacion;

        $encuentros = $club_participacion->first()->encuentro_club_participaciones;

        //return response()->json($disciplinas);
        //dd($encuentros);
        /* $view = view('partido.plantilla_listar_partidos')->with('club_part', $club_participacion)->with('participacion',$participacion)->with('encuentros',$encuentros)->render();
        return response()->json(array('success' => true, 'html'=>$view));
 */
        return view('partido.plantilla_listar_partidos')->with('club_part', $club_participacion)->with('participacion',$participacion)->with('encuentros',$encuentros);

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
}
