<?php

namespace App\Http\Controllers;
use App\Models\Gestion;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\Jugador_Club;
use App\Models\Disciplina;
use App\Models\Club_Participacion;
use App\Models\Participacion;
use App\Models\Aviso;
use App\Models\Encuentro;
use App\Models\Encuentro_Club_Participacion;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2($disc = '2' , $hoy = null )
    {
        if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        }

        $avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        //ENCUENTROS
        $clubs_part = Club_Participacion::where('id_disc',$disc)->select('id_club_part')->orderBy('id_gestion','ASC')->get();
        $id_clubs_part =[];
        foreach($clubs_part as $dato){
            array_push($id_clubs_part, $dato->id_club_part);
        }

        $encuentros = Encuentro::where('fecha',$hoy)->select('id_encuentro')->get();
        $id_encuentros =[];
        foreach($encuentros as $dato_e){
            array_push($id_encuentros, $dato_e->id_encuentro);
        }

        $encuentro_clubs_part = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)->whereIn('id_club_part',$id_clubs_part)->get();
        $disciplinas = Disciplina::all();
        
        return view('home')->with('avisos',$avisos)->with('encuentros',$encuentro_clubs_part)->with('disciplinas',$disciplinas)->with('disc',$disc)->with('fecha',$hoy);
    }

    public function index($disc = '2' , $hoy = null )
    {
        if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        }

        $avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        //ENCUENTROS

        $encuentros = DB::table('encuentro_club_participaciones')
                            ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->where('club_participaciones.id_disc',$disc)
                            ->where('encuentros.fecha',$hoy)
                            ->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion', 'encuentros.*','clubs.*','centros.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                            ->get();
        /* $clubs_part = Club_Participacion::where('id_disc',$disc)->select('id_club_part')->orderBy('id_gestion','ASC')->get();
        $id_clubs_part =[];
        foreach($clubs_part as $dato){
            array_push($id_clubs_part, $dato->id_club_part);
        }

        $encuentros = Encuentro::where('fecha',$hoy)->select('id_encuentro')->get();
        $id_encuentros =[];
        foreach($encuentros as $dato_e){
            array_push($id_encuentros, $dato_e->id_encuentro);
        }
        
        $encuentro_clubs_part = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)->whereIn('id_club_part',$id_clubs_part)->get();
         */$disciplinas = Disciplina::all();
        $encuentros2 = $encuentros->groupBy('id_gestion');
        return view('home')->with('avisos',$avisos)->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disc',$disc)->with('fecha',$hoy);
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
