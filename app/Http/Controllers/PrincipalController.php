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
use App\Models\Tabla_Posicion;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Fase;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2($disc = '1' , $hoy = null )
    {
        if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        }

        $avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        
        
        //ENCUENTROS
        $disciplina = Disciplina::find($disc);
        if ($disciplina->tipo == 0) 
        {
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
            $disciplinas_2 = Disciplina::select('nombre_disc')->distinct()->get();
        }else{
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
        }
       
        
        return view('home')->with('avisos',$avisos)->with('encuentros',$encuentro_clubs_part)->with('disciplinas',$disciplinas)->with('disciplinas2',$disciplinas_2)->with('disc',$disc)->with('fecha',$hoy);
    }
    
    public function partidos_hoy_original(Request $request)
    {
        $hoy = $request->hoy;
        $disc = $request->disc;

        
        //ENCUENTROS

        $disciplina = Disciplina::find($disc);
        if ($disciplina->tipo == 0) 
        {
            $encuentros = DB::table('encuentro_club_participaciones')
                            ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->where('club_participaciones.id_disc',$disc)
                            ->where('encuentros.fecha',$hoy)
                            ->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                            ->get();
        }else{
            
            $encuentros = DB::table('encuentro_seleccions')
            ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
            ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
            ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
            ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
            /* ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
            ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
            ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
            ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo') */
            //->where('fases.id_fase',$fase->id_fase)
            ->where('encuentros.fecha',$hoy)
            ->where('club_participaciones.id_disc',$disc)
            //->where('club_participaciones.id_gestion',$id_gestion)
            ->select('encuentro_seleccions.id_encuentro_seleccion','gestiones.nombre_gestion','gestiones.id_gestion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','encuentros.id_encuentro','centros.nombre_centro','centros.ubicacion_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador','jugadores.foto_jugador')
            ->orderBy('encuentros.hora','ASC')
            ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
            ->get();
        }
        $disciplinas = Disciplina::all();
        $disciplinas_2 = Disciplina::select('nombre_disc')->distinct()->get();

        $encuentros2 = $encuentros->groupBy('id_gestion');
        //dd($encuentros2);
        $view = view('principal.plantilla_partidos_hoy')->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disc',$disc)->render();
        
        return response()->json(array('success' => true, 'html'=>$view));
         
    }
    public function index($disc = '1' , $hoy = null)
    {
        if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        }

        $avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        //ENCUENTROS
        $disciplina = Disciplina::find($disc);
        $disciplinas2 = Disciplina::select('nombre_disc')->distinct()->get();

        if ($disciplina->tipo == 0) 
        {
            $encuentros = DB::table('encuentro_club_participaciones')
                            ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->where('club_participaciones.id_disc',$disc)
                            ->where('encuentros.fecha',$hoy)
                            ->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                            ->get();
        }else{
            
            $encuentros = DB::table('encuentro_seleccions')
            ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
            ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
            ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
            ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
            /* ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
            ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
            ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
            ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo') */
            //->where('fases.id_fase',$fase->id_fase)
            ->where('encuentros.fecha',$hoy)
            ->where('club_participaciones.id_disc',$disc)
            //->where('club_participaciones.id_gestion',$id_gestion)
            ->select('encuentro_seleccions.id_encuentro_seleccion','gestiones.nombre_gestion','gestiones.id_gestion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','encuentros.id_encuentro','centros.nombre_centro','centros.ubicacion_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador','jugadores.foto_jugador')
            ->orderBy('encuentros.hora','ASC')
            ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
            ->get();
        }

         $disciplinas = Disciplina::all();
        $encuentros2 = $encuentros->groupBy('id_gestion');
        //dd($encuentros2);

        if(Auth::check())
        return view('home2')->with('avisos',$avisos)->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disc',$disc)->with('fecha',$hoy);
        else
        return view('home')->with('avisos',$avisos)->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disciplinas2',$disciplinas2)->with('disc',$disc)->with('fecha',$hoy);
    }

    public function index_conjunto($disc = 'Futbol' , $hoy = null )
    {
        if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        }
        $avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        //ENCUENTROS
        //$disciplina = Disciplina::find($disc);
        $consulta = new Disciplina;
        $disciplinas2 = Disciplina::select('nombre_disc')->distinct()->get();

        $disciplinas_ids = Disciplina::where('nombre_disc',$disc)->get();
        $array_disc=[];
        //obtenemos los id de las dics que sean de futbol
        foreach ($disciplinas_ids as $d) {
            array_push($array_disc,$d->id_disc);
        }
        //dd($array_disc);

        if ($disciplinas_ids->first()->tipo == 0) //equipo
        {
            if ($consulta->es_set($disciplinas_ids->first()->id_disc) == 1 || $consulta->es_raquetaFronton($disciplinas_ids->first()->id_disc) == 1) {
                $encuentros = DB::table('encuentro_club_participaciones_sets')
                            ->join('club_participaciones', 'encuentro_club_participaciones_sets.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
                            ->join('encuentros', 'encuentro_club_participaciones_sets.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->whereIn('club_participaciones.id_disc',$array_disc)
                            ->where('encuentros.fecha',$hoy)
                            //->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*','disciplinas.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones_sets.id_encuentro_club_part_set','ASC')
                            ->get();
            } else {
                $encuentros = DB::table('encuentro_club_participaciones')
                            ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
                            ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->whereIn('club_participaciones.id_disc',$array_disc)
                            ->where('encuentros.fecha',$hoy)
                            //->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*','disciplinas.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                            ->get();
            }
            
           
        }else{//competicion
            
            $encuentros = DB::table('encuentro_seleccions')
            ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
            ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
            ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
            ->join('centros', 'encuentros.id_centro', '=', 'centros.id_centro')
            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
            ->whereIn('club_participaciones.id_disc',$array_disc)
            ->where('encuentros.fecha',$hoy)
            ->orderBy('encuentros.hora','ASC')
            ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
            ->get();
        }

         $disciplinas = Disciplina::all();
        $encuentros2 = $encuentros->groupBy('id_gestion');
        //dd($encuentros2);

        if(Auth::check())
        return view('home2')->with('avisos',$avisos)->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disc',$disc)->with('fecha',$hoy);
        else
        return view('home_prueba')->with('avisos',$avisos)->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disciplinas2',$disciplinas2)->with('disc',$disc)->with('fecha',$hoy);
    }

    public function partidos_hoy(Request $request)
    {
        /* if ($hoy == null) {
            $dato = new \DateTime();
            $hoy = $dato->format('Y-m-d');
        } */
        $hoy = $request->hoy;
        $disc = $request->disc;//nombre

        //$avisos = Aviso::where('fecha_fin_aviso','>=',$hoy)->orderBy('fecha_ini_aviso','DESC')->orderBy('hora_publicacion','DESC')->get();
        
        //ENCUENTROS
        //$disciplina = Disciplina::find($disc);
        $consulta = new Disciplina;
        //$disciplinas2 = Disciplina::select('nombre_disc')->distinct()->get();

        $disciplinas_ids = Disciplina::where('nombre_disc',$disc)->get();
        $array_disc=[];
        //obtenemos los id de las dics que sean de futbol
        foreach ($disciplinas_ids as $d) {
            array_push($array_disc,$d->id_disc);
        }
        //dd($array_disc);

        if ($disciplinas_ids->first()->tipo == 0) //equipo
        {
            if ($consulta->es_set($disciplinas_ids->first()->id_disc) == 1 || $consulta->es_raquetaFronton($disciplinas_ids->first()->id_disc) == 1) {
                $encuentros = DB::table('encuentro_club_participaciones_sets')
                            ->join('club_participaciones', 'encuentro_club_participaciones_sets.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
                            ->join('encuentros', 'encuentro_club_participaciones_sets.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->whereIn('club_participaciones.id_disc',$array_disc)
                            ->where('encuentros.fecha',$hoy)
                            //->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*','disciplinas.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones_sets.id_encuentro_club_part_set','ASC')
                            ->get();
            } else {
                $encuentros = DB::table('encuentro_club_participaciones')
                            ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
                            ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                            ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                            ->whereIn('club_participaciones.id_disc',$array_disc)
                            ->where('encuentros.fecha',$hoy)
                            //->select('encuentro_club_participaciones.*', 'gestiones.id_gestion','gestiones.nombre_gestion','gestiones.id_gestion','fases.id_fase', 'fases.nombre_fase','encuentros.*','clubs.*','centros.*','disciplinas.*')
                            ->orderBy('gestiones.id_gestion','ASC')
                            ->orderBy('encuentros.hora','ASC')
                            ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                            ->get();
            }
            
           
        }else{//competicion
            
            $encuentros = DB::table('encuentro_seleccions')
            ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
            ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
            ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
            ->join('centros', 'encuentros.id_centro', '=', 'centros.id_centro')
            ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
            ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
            ->whereIn('club_participaciones.id_disc',$array_disc)
            ->where('encuentros.fecha',$hoy)
            ->orderBy('encuentros.hora','ASC')
            ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
            ->get();
        }

        $disciplinas = Disciplina::all();
        $disciplinas_2 = Disciplina::select('nombre_disc')->distinct()->get();

        $encuentros2 = $encuentros->groupBy('id_gestion');
        //dd($encuentros2);

        $view = view('principal.plantilla_partidos_hoy')->with('encuentros',$encuentros2)->with('disciplinas',$disciplinas)->with('disc',$disc)->render();
        
        return response()->json(array('success' => true, 'html'=>$view));
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
    public function tabla_pos($id_gestion,$id_disc,$id_fase){
        $cp = Club_Participacion::where('id_gestion',$id_gestion)->where('id_disc',$id_disc)->get();
        $ids[]=null;
        foreach($cp as $id)
        {
            array_push($ids, $id->id_club_part);
        }
        //$id_club_part = $cp->first()->id_club_part;

        $i=1;
        $tbs = Tabla_Posicion::where('id_fase',$id_fase)->whereIn('id_club_part',$ids)->get();
        $dato="
        <table class='table table-sm table-bordered'>
        <thead>
            <tr>
                <td>#</td>
            
                <td colspan='2'>Club</td>
            
                <td>PJ</td>
            
                <td>PG</td>
            
                <td>PP</td>
                <td>PE</td>
                <td>PUNTOS</td>
            </tr>
           
        </thead>
        <tbody class='table-bordered'>
        ";

        //dd($tbs);
        foreach ($tbs as $tb) {
            $dato.=" 
                <tr>
                    <td>".$i."</td>
                    
                    <td>
                        <img src='storage/logos/".$tb->club_participacion->club->logo."' alt='logo' height='30' width='30' style='padding-inline-end: 5px'>
                    </td>
                    <td class='float-left'>
                        ".$tb->club_participacion->club->nombre_club."
                    </td>
                    <td>
                        ".$tb->pj."
                    </td>
                    <td>
                        ".$tb->pg."
                    </td>
                    <td>
                        ".$tb->pp."
                    </td>
                    <td>
                        ".$tb->pe."
                    </td>
                    <td>
                        ".$tb->puntos."
                    </td>
                </tr>";
                $i++;
        }


        $dato.=" </tbody>
        </table>";
        //dd($dato);

        return response()->json($dato);
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

    public function mostrar_posiciones($id_gestion, $id_fase, $id_disc){

        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $disciplinas2 = Disciplina::select('nombre_disc')->distinct()->get();
        //dd($id_fase);

        $fase = Fase::find($id_fase);
        if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'series') {
            if ($disciplina->tipo == 0) { //    equipo
                if ($disciplina->es_set($id_disc) || $disciplina->es_raquetaFronton($id_disc)== 1) {
                    $tabla_posiciones = DB::table('tabla_posiciones_sets')
                        ->join('club_participaciones','tabla_posiciones_sets.id_club_part','club_participaciones.id_club_part')
                        ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                        ->join('grupos','grupo_club_participaciones.id_grupo','grupos.id_grupo')
                        ->join('fases','grupos.id_fase','fases.id_fase')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->where('tabla_posiciones_sets.id_fase',$id_fase)
                        ->orderBy('nombre_grupo','asc')
                        ->orderBy('puntos','desc')
                        ->orderBy('pj','desc')
                        ->orderBy('ds','desc')
                        ->orderBy('dp','desc')
                        ->get()->groupBy('id_grupo');
                /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                //dd($tabla_posiciones);
                return view('gestiones.home_tabla_pos_equipo_set',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));
                } else {
                    $tabla_posiciones = DB::table('tabla_posicions')
                        ->join('club_participaciones','tabla_posicions.id_club_part','club_participaciones.id_club_part')
                        ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                        ->join('grupos','grupo_club_participaciones.id_grupo','grupos.id_grupo')
                        ->join('fases','grupos.id_fase','fases.id_fase')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->where('tabla_posicions.id_fase',$id_fase)
                        ->orderBy('nombre_grupo','asc')
                        ->orderBy('puntos','desc')
                        ->orderBy('pj','desc')
                        ->orderBy('dg','desc')
                        ->orderBy('gf','desc')
                        ->orderBy('gc','desc')
                        ->get()->groupBy('id_grupo');
                /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                //dd($tabla_posiciones);
                return view('gestiones.home_tabla_pos_equipo',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));
                }
                
                
        
            } 
            else {//SERIE COMPETICION
                if ($disciplina->es_raquetaFronton($id_disc)== 2) {

                $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                    ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                    ->orderBy('nombre_grupo','asc')
                    ->orderBy('tabla_posicion_jugadors.puntos','desc')
                    ->orderBy('tabla_posicion_jugadors.pj','desc')
                    ->orderBy('tabla_posicion_jugadors.ds','desc')
                    ->orderBy('tabla_posicion_jugadors.dp','desc')
                    ->get();

                return view('gestiones.home_tabla_pos_competicion_set',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));
                }else{
                    

                    if($disciplina->es_ajedrez($id_disc)== 1){
                        $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                        ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('posicion','desc')
                        ->get();
                        return view('gestiones.home_tabla_pos_competicion_ajedrez',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));

                    }else{
                        $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                        ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('tiempo_total','asc')
                        ->orderBy('posicion','asc')
                        ->get();
                        return view('gestiones.home_tabla_pos_competicion',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));

                    }

                }
            }
        } else {//ELIMINACION
            if ($disciplina->tipo == 0) { //EQUIPO
                if ($disciplina->es_set($id_disc) || $disciplina->es_raquetaFronton($id_disc)== 1) {
                    $tabla_posiciones = DB::table('tabla_posiciones_sets')
                    ->join('club_participaciones','tabla_posiciones_sets.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('fases','tabla_posiciones_sets.id_fase','fases.id_fase')
                    //->join('fechas','fases.id_fase','fechas.id_fase')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('tabla_posiciones_sets.id_fase',$id_fase)
                    ->orderBy('puntos','desc')
                    ->orderBy('pj','desc')
                    ->orderBy('ds','desc')
                    ->orderBy('dp','desc')
                    ->get()->groupBy('id_grupo');
                    /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                    //dd($tabla_posiciones);
                    $fechas = Fase::find($id_fase)->fechas;
                    
                    $encuentros_resultados = DB::table('encuentro_club_participaciones_sets')
                    ->join('encuentros','encuentro_club_participaciones_sets.id_encuentro','encuentros.id_encuentro')
                    ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                    ->join('fases','fechas.id_fase','fases.id_fase')
                    ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentro_club_participaciones_sets.id_fase',$id_fase)
                    ->orderBy('encuentro_club_participaciones_sets.id_encuentro_club_part_set')
                    ->get()->groupBy('id_fecha');
                    return view('gestiones.home_tabla_pos_equipo_eliminacion_set',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas','disciplinas2'));
                }else{//no es set
                    $tabla_posiciones = DB::table('tabla_posicions')
                    ->join('club_participaciones','tabla_posicions.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('fases','tabla_posicions.id_fase','fases.id_fase')
                    //->join('fechas','fases.id_fase','fechas.id_fase')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('tabla_posicions.id_fase',$id_fase)
                    ->orderBy('puntos','desc')
                    ->orderBy('pj','desc')
                    ->orderBy('dg','desc')
                    ->orderBy('gf','desc')
                    ->orderBy('gc','desc')
                            ->get()->groupBy('id_grupo');
                    /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                    //dd($tabla_posiciones);
                    $fechas = Fase::find($id_fase)->fechas;

                    $encuentros_resultados = DB::table('encuentro_club_participaciones')
                    ->join('encuentros','encuentro_club_participaciones.id_encuentro','encuentros.id_encuentro')
                    ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                    ->join('fases','fechas.id_fase','fases.id_fase')
                    ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentro_club_participaciones.id_fase',$id_fase)
                    ->orderBy('encuentro_club_participaciones.id_encuentro_club_part')
                    ->get()->groupBy('id_fecha');
                    return view('gestiones.home_tabla_pos_equipo_eliminacion',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas','disciplinas2'));
                }
            } 
            else {
                if ($disciplina->es_raquetaFronton($id_disc)== 2) {

                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('tabla_posicion_jugadors.puntos','desc')
                        ->orderBy('tabla_posicion_jugadors.pj','desc')
                        ->orderBy('tabla_posicion_jugadors.ds','desc')
                        ->orderBy('tabla_posicion_jugadors.dp','desc')
                        ->get();

                    /* $fechas_e = Fase::find($id_fase)->fechas;
                    $array_fechas=[];

                    foreach ($fechas_e as $fecha) {
                        array_push($array_fechas,$fecha->id_fecha);
                    } */



                    $fechas = Fase::find($id_fase)->fechas;

                    $encuentros_ids= DB::table('encuentros')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->where('fechas.id_fase',$id_fase)
                        ->where('fases.id_fase',$id_fase)
                        ->get();
                    $array=[];

                    foreach ($encuentros_ids as $e) {
                        array_push($array,$e->id_encuentro);
                    }
                    /* dd($array); */

                    $encuentros_resultados = DB::table('encuentro_seleccions')
                        ->join('encuentros','encuentro_seleccions.id_encuentro','encuentros.id_encuentro')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                        ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->whereIn('encuentro_seleccions.id_encuentro',$array)
                        ->orderBy('encuentro_seleccions.id_encuentro_seleccion')
                        ->get()->groupBy('id_fecha');

                return view('gestiones.home_tabla_pos_competicion_eliminacion_set',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas','disciplinas2'));


                }elseif($disciplina->es_ajedrez($id_disc)== 1) {


                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                    ->orderBy('posicion','desc')
                    ->orderBy('cantidad_encuentros','desc')
                    ->get();
                    $fechas = Fase::find($id_fase)->fechas;
                    
                    $encuentros_ids= DB::table('encuentros')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->where('fechas.id_fase',$id_fase)
                        ->where('fases.id_fase',$id_fase)
                        ->get();
                    $array=[];

                    foreach ($encuentros_ids as $e) {
                        array_push($array,$e->id_encuentro);
                    }
                    /* dd($array); */

                    $encuentros_resultados = DB::table('encuentro_seleccions')
                        ->join('encuentros','encuentro_seleccions.id_encuentro','encuentros.id_encuentro')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                        ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->whereIn('encuentro_seleccions.id_encuentro',$array)
                        ->orderBy('encuentro_seleccions.id_encuentro_seleccion')
                        ->get()->groupBy('id_fecha');


                    return view('gestiones.home_tabla_pos_competicion_eliminacion_ajedrez',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas','disciplinas2'));
                }else {
                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)->get();

                    return view('gestiones.home_tabla_pos_competicion_eliminacion',compact('tabla_posiciones','gestion','disciplina','fase','disciplinas2'));
                }
                

                
    
            }
        }
        
        
        
    }

    
}
