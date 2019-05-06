<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use PDF;
use App\Models\Participacion;
use App\Models\Club_Participacion;
use App\Models\Club;
use App\Models\Inscripcion;
use App\Models\Admin_club;
use App\Models\Disciplina;
use App\Models\Fase;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones = Gestion::all();
        $clubs =Club::all();
        return view('reportes.reportes_index_admin')->with('gestiones',$gestiones)->with('clubs',$clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pdf_gestiones(Request $request){
        $id_gestion = $request->id_gestion; 
        $opciones = $request->opciones;
        $participaciones = null;
        $inscripciones = null;

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>No se registraron partidos aun.</h1>');

        if (!is_null($opciones) && in_array("disciplinas", $opciones)) 
        {
           /* $participaciones = Participacion::where('id_gestion', $id_gestion)->get(); */
           $participaciones = DB::table('participaciones')
                            ->join('gestiones', 'participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('disciplinas', 'participaciones.id_disciplina', '=', 'disciplinas.id_disc')
                            ->where('participaciones.id_gestion',$id_gestion)
                            ->select('disciplinas.*')
                            /* ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC') */
                            ->get();
        } 
        if(!is_null($opciones) && in_array("clubs", $opciones)) {
            $inscripciones = DB::table('inscripciones')
                            ->join('adminclubs', 'inscripciones.id_adminClub', '=', 'adminclubs.id_adminClub')
                            ->join('clubs', 'adminclubs.id_club', '=', 'clubs.id_club')
                            ->where('inscripciones.id_gestion',$id_gestion)
                            ->select('clubs.*')
                            /* ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC') */
                            ->get();
           /*  $inscripciones = Inscripcion::where('id_gestion', $id_gestion)->get(); */
        }
        
        
        $gestion = Gestion::find($id_gestion);
        //dd($opciones);

        if($participaciones == null && $inscripciones == null && $id_gestion == null){
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>No se registraron gestiones aun.</h1>');
        }else{
            $pdf = PDF::loadView('reportes.gestiones.pdf_gestiones', ['gestion'=>$gestion,'participaciones'=>$participaciones,'inscripciones'=>$inscripciones]);
        }

         //return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reportes.pdf_jugadores', ['jugadores'=>$jug_club])->stream();


        return  $pdf->stream('reporte_gestion.pdf');
    }
    public function pdf_clubs(Request $request){
        $id_club = $request->id_club; 
        $id_ac = Admin_club::where('id_club', $id_club)->get();
        $id_gestion = $request->id_gestion_club; 
        $id_club_part = $request->id_disc_club; 
        $opcion = $request->opcion;

        $planilla = null;
        $inscripciones = null;

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>No se registraron clubs aun.</h1>');


        $club = Club::find($id_club);
        $gestion = Gestion::find($id_gestion);
        $cp = Club_participacion::find($id_club_part);
        //$disciplina = $cp->disciplina->nombre_disc." ".$cp->disciplina->nombre_categoria($cp->disciplina->categoria);

        //JUGADORES INSCRITOS EN EL CLUB
        if (!is_null($id_club) && is_null($id_gestion) && is_null($id_club_part) && $opcion == 'planilla') 
        {
           $planilla = DB::table('jugador_clubs')
                            ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                            ->where('clubs.id_club',$id_club)
                            ->select('jugadores.*')
                            ->orderBy('jugadores.nombre_jugador','ASC')
                            ->get();
            $pdf = PDF::loadView('reportes.clubs.pdf_clubs_planilla', ['planilla'=>$planilla,'club'=>$club]);
                            
        }
        //JUGADORES HABILITADOS EN EL CLUB EN UNA GESTION
        if (!is_null($id_club) && !is_null($id_gestion) && is_null($id_club_part) && $opcion == 'planilla')
        {
            $planilla = DB::table('jugador_inscripciones')
                            ->join('inscripciones', 'jugador_inscripciones.id_inscripcion', '=', 'inscripciones.id_inscripcion')
                            ->join('jugadores', 'jugador_inscripciones.id_jugador', '=', 'jugadores.id_jugador')
                            ->where('id_adminClub', $id_ac->first()->id_adminClub)
                            ->where('inscripciones.id_gestion',$id_gestion)
                            ->select('jugadores.*')
                            ->orderBy('jugadores.nombre_jugador','ASC')
                            ->get();
            $pdf = PDF::loadView('reportes.clubs.pdf_clubs_planilla2', ['planilla'=>$planilla,'club'=>$club,'gestion'=>$gestion]);
        }
        //JUGADORES HABILITADOS EN EL CLUB EN UNA GESTION PARA UNA DISCIPLINA UN ENCUENTRO
        if (!is_null($id_club) && !is_null($id_gestion) && !is_null($id_club_part) && $opcion == 'planilla')
        {
            $planilla = DB::table('selecciones')
                            ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                            ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                            ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                            ->where('club_participaciones.id_club_part', $id_club_part)
                            ->select('jugadores.*')
                            ->orderBy('jugadores.nombre_jugador','ASC')
                            ->get();

            $pdf = PDF::loadView('reportes.clubs.pdf_clubs_planilla3', ['planilla'=>$planilla,'cp'=>$cp/* 'club'=>$club,'gestion'=>$gestion,'disc'=>$disciplina */]);
        }
        if (!is_null($id_club) && !is_null($id_gestion) && $opcion == 'inscripcion')
        {
            $inscripcion = DB::table('club_participaciones')
                            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                            ->join('gestiones', 'club_participaciones.id_gestion', '=', 'gestiones.id_gestion')
                            ->join('disciplinas', 'club_participaciones.id_disc', '=', 'disciplinas.id_disc')
                            ->where('clubs.id_club', $id_club)
                            ->where('gestiones.id_gestion', $id_gestion)
                            ->select('disciplinas.*')
                            ->orderBy('club_participaciones.id_club_part','ASC')
                            ->get();

            $pdf = PDF::loadView('reportes.clubs.pdf_clubs_planilla4', ['inscripcion'=>$inscripcion, 'club'=>$club,'gestion'=>$gestion]);
        }

       return  $pdf->stream('planilla.pdf');
    }
    public function pdf_fixture(Request $request)
    {
        $id_gestion = $request->id_gestion_fix; 
        $id_part = $request->id_disc_fix; 
        $opcion = $request->opcion;
        $fecha = $request->fecha;
        //dd($opcion);
        $fix_fases = [];
        $fix_fechas= [];
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>No se registraron partidos aun.</h1>');


        
        //dd($disciplina);
        //$disciplina = $cp->disciplina->nombre_disc." ".$cp->disciplina->nombre_categoria($cp->disciplina->categoria);

        //JUGADORES INSCRITOS EN EL CLUB
        if($id_part != null)
        {
            $gestion = Gestion::find($id_gestion);
            $part = Participacion::find($id_part);
            $id_disc = $part->id_disciplina; 
            $disciplina = Disciplina::find($id_disc); 
            if (!is_null($id_gestion) && !is_null($id_part) && $opcion == 'fix_fases') 
            {
                //echo('entrooooooooooooooo');
    
                foreach ($part->fases as $fase) 
                {
                    if ($disciplina->tipo == "0") 
                    {//equipo
                        if($fase->fase_tipos->first()->id_tipo == 1)//series
                        {
                        //equipos
                            # code...
                            $tipo = DB::table('encuentro_club_participaciones')
                                ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
                                ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',"1")
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_club_participaciones.id_encuentro_club_part','encuentro_club_participaciones.puntos','encuentro_club_participaciones.goles','fases.id_fase','fases.nombre_fase','tipos.id_tipo','grupos.id_grupo','grupos.nombre_grupo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo')
                                ->orderBy('encuentros.fecha','ASC')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                                ->get();
    
                            array_push($fix_fases,$tipo);
                        
                            
                        }
                        else
                        {
                            $tipo2 = DB::table('encuentro_club_participaciones')
                                ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',2)
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_club_participaciones.id_encuentro_club_part','encuentro_club_participaciones.puntos','encuentro_club_participaciones.goles','fases.id_fase','fases.nombre_fase','tipos.id_tipo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo')
                                ->orderBy('encuentros.fecha','ASC')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                                ->get();
    
    
                                array_push($fix_fases,$tipo2);
                        }
                        $pdf = PDF::loadView('reportes.fixture.pdf_fixture', ['fix_fases'=>$fix_fases,'gestion'=>$gestion,'disciplina'=>$disciplina]);
    
                    }else
                    {//competicion
                        if($fase->fase_tipos->first()->id_tipo == 1)//series
                        {
                            $tipo = DB::table('encuentro_seleccions')
                                ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
                                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
                                ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',"1")
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_seleccions.id_encuentro_seleccion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','tipos.id_tipo', 'grupos.id_grupo', 'grupos.nombre_grupo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                                ->orderBy('encuentros.fecha','ASC')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
                                ->get();
    
                                    array_push($fix_fases,$tipo);
                        }
                        else
                        {
                            echo("3ntro 2");
                            $tipo2 = DB::table('encuentro_seleccions')
                                ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
                                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',2)
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_seleccions.id_encuentro_seleccion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','tipos.id_tipo','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                                ->orderBy('encuentros.fecha','ASC')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
                                ->get();
    
    
                                array_push($fix_fases,$tipo2);
                        }
                        $pdf = PDF::loadView('reportes.fixture.pdf_fixture2', ['fix_fases'=>$fix_fases,'gestion'=>$gestion,'disciplina'=>$disciplina]);
            
                    }
    
                }  
            }
            else{
                //echo('entrooooooooooooooo');
    
                if ($opcion == "fix_fecha") {
                //echo('entrooooooooooooooo');
    
                foreach ($part->fases as $fase) 
                {
                    if ($disciplina->tipo == 0) 
                    {//equipo
                        if($fase->fase_tipos->first()->id_tipo == 1)//series
                        {
                        //equipos
                            echo("entrooooooooooooooooooooo");
                            $tipo = DB::table('encuentro_club_participaciones')
                                ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
                                ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',"1")
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->where('encuentros.fecha',$fecha)
                                ->select('encuentro_club_participaciones.id_encuentro_club_part','encuentro_club_participaciones.puntos','encuentro_club_participaciones.goles','fases.id_fase','fases.nombre_fase','tipos.id_tipo','grupos.id_grupo','grupos.nombre_grupo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                                ->get();
    
                            array_push($fix_fechas,$tipo);
                        
                            
                        }
                        else
                        {
                            $tipo2 = DB::table('encuentro_club_participaciones')
                                ->join('club_participaciones', 'encuentro_club_participaciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_club_participaciones.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('tipos.id_tipo',2)
                                ->where('encuentros.fecha',$fecha)
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_club_participaciones.id_encuentro_club_part','encuentro_club_participaciones.puntos','encuentro_club_participaciones.goles','fases.id_fase','fases.nombre_fase','tipos.id_tipo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_club_participaciones.id_encuentro_club_part','ASC')
                                ->get();
    
    
                                array_push($fix_fechas,$tipo2);
                        }
                        $pdf = PDF::loadView('reportes.fixture.pdf_fixture3', ['fix_fechas'=>$fix_fechas,'gestion'=>$gestion,'disciplina'=>$disciplina]);
    
                    }else
                    {//competicion
                        if($fase->fase_tipos->first()->id_tipo == 1)//series
                        {
                            $tipo = DB::table('encuentro_seleccions')
                                ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
                                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->join('fechas_grupos', 'fechas.id_fecha', '=', 'fechas_grupos.id_fecha')
                                ->join('grupos', 'fechas_grupos.id_grupo', '=', 'grupos.id_grupo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('encuentros.fecha',$fecha)
                                ->where('tipos.id_tipo',"1")
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_seleccions.id_encuentro_seleccion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','tipos.id_tipo', 'grupos.id_grupo', 'grupos.nombre_grupo','fechas.id_fecha','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
                                ->get();
    
                                    array_push($fix_fechas,$tipo);
                        }
                        else
                        {
                            echo("3ntro 2");
                            $tipo2 = DB::table('encuentro_seleccions')
                                ->join('selecciones', 'encuentro_seleccions.id_seleccion', '=', 'selecciones.id_seleccion')
                                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                                ->join('encuentros', 'encuentro_seleccions.id_encuentro', '=', 'encuentros.id_encuentro')
                                ->join('centros', 'centros.id_centro', '=', 'encuentros.id_centro')
                                ->join('fechas', 'encuentros.id_fecha', '=', 'fechas.id_fecha')
                                ->join('fases', 'fechas.id_fase', '=', 'fases.id_fase')
                                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                                ->where('fases.id_fase',$fase->id_fase)
                                ->where('encuentros.fecha',$fecha)
                                ->where('tipos.id_tipo',2)
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('encuentro_seleccions.id_encuentro_seleccion','encuentro_seleccions.posicion','fases.id_fase','fases.nombre_fase','tipos.id_tipo','fechas.nombre_fecha','encuentros.id_encuentro','centros.nombre_centro','encuentros.fecha','encuentros.hora','clubs.id_club','clubs.nombre_club','clubs.logo','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                                ->orderBy('encuentros.hora','ASC')
                                ->orderBy('encuentro_seleccions.id_encuentro_seleccion','ASC')
                                ->get();
    
    
                                array_push($fix_fechas,$tipo2);
                        }
                        $pdf = PDF::loadView('reportes.fixture.pdf_fixture4', ['fix_fechas'=>$fix_fechas,'gestion'=>$gestion,'disciplina'=>$disciplina]);
            
                    }
    
                }
    
            } 
        }
        
    }
        //dd($fix_fechas);
       // return view('reportes.fixture.pdf_fixture3',compact('fix_fechas','gestion','disciplina'));
        return $pdf->stream('fixture.pdf');
    }
    public function pdf_resultados(Request $request){
        $id_gestion = $request->id_gestion_res; 
        $id_part = $request->id_disc_res; 
        $id_fase = $request->id_fase_res;

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>No se registraron partidos aun.</h1>');

        $gestion = Gestion::find($id_gestion);
        $fase = Fase::find($id_fase);
        
        if($id_part != null)
        {
            $part = Participacion::find($id_part);
            $id_disc = $part->id_disciplina; 
            $disciplina = Disciplina::find($id_disc);

            if ($disciplina->tipo == 0) 
            {
            if($fase->fase_tipos->first()->id_tipo == 1)
            {
                $dato = DB::table('tabla_posicions')
                ->join('fases', 'tabla_posicions.id_fase', '=', 'fases.id_fase')
                ->join('club_participaciones', 'tabla_posicions.id_club_part', '=', 'club_participaciones.id_club_part')
                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                ->join('grupo_club_participaciones', 'club_participaciones.id_club_part', '=', 'grupo_club_participaciones.id_club_part')
                ->join('grupos', 'grupo_club_participaciones.id_grupo', '=', 'grupos.id_grupo')
                ->where('fases.id_fase',$id_fase)
                ->where('tipos.id_tipo',"1")
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->select('grupo_club_participaciones.*','fases.id_fase','fases.nombre_fase','tipos.id_tipo', 'grupos.id_grupo', 'grupos.nombre_grupo','clubs.nombre_club','clubs.logo','tabla_posicions.*')
                ->orderBy('grupos.id_grupo','ASC')
                ->orderBy('tabla_posicions.puntos','DESC')
                ->get();
    
            }else{
                $dato = DB::table('tabla_posicions')
                ->join('fases', 'tabla_posicions.id_fase', '=', 'fases.id_fase')
                ->join('club_participaciones', 'tabla_posicions.id_club_part', '=', 'club_participaciones.id_club_part')
                ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                /* ->join('grupo_club_participaciones', 'club_participaciones.id_club_part', '=', 'grupo_club_participaciones.id_club_part')
                ->join('grupos', 'grupo_club_participaciones.id_grupo', '=', 'grupos.id_grupo') */
                ->where('fases.id_fase',$id_fase)
                ->where('tipos.id_tipo',"2")
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->select(/* 'grupo_club_participaciones.*', */'fases.id_fase','fases.nombre_fase','tipos.id_tipo','clubs.nombre_club','clubs.logo','tabla_posicions.*')
                //->orderBy('grupos.id_grupo','ASC')
                ->orderBy('tabla_posicions.puntos','DESC')
                ->get();

            }
            
            $pdf = PDF::loadView('reportes.resultados.pdf_resultados', ['dato'=>$dato,'gestion'=>$gestion,'disciplina'=>$disciplina]);
        }else{
            if($fase->fase_tipos->first()->id_tipo == 1)
            {
                $dato = DB::table('tabla_posicion_jugadors')
                ->join('fases', 'tabla_posicion_jugadors.id_fase', '=', 'fases.id_fase')
                ->join('selecciones', 'tabla_posicion_jugadors.id_seleccion', '=', 'selecciones.id_seleccion')
                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                ->join('grupo_club_participaciones', 'club_participaciones.id_club_part', '=', 'grupo_club_participaciones.id_club_part')
                ->join('grupos', 'grupo_club_participaciones.id_grupo', '=', 'grupos.id_grupo')
                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                ->where('fases.id_fase',$id_fase)
                ->where('tipos.id_tipo',"1")
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->select('fases.id_fase','fases.nombre_fase','tipos.id_tipo', 'grupos.id_grupo', 'grupos.nombre_grupo','clubs.nombre_club','clubs.logo','tabla_posicion_jugadors.*','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                ->orderBy('grupos.id_grupo','ASC')
                ->orderBy('tabla_posicion_jugadors.posicion','ASC')
                ->get();
    
            }else{
                $dato = DB::table('tabla_posicion_jugadors')
                ->join('fases', 'tabla_posicion_jugadors.id_fase', '=', 'fases.id_fase')
                ->join('selecciones', 'tabla_posicion_jugadors.id_seleccion', '=', 'selecciones.id_seleccion')
                ->join('club_participaciones', 'selecciones.id_club_part', '=', 'club_participaciones.id_club_part')
                ->join('jugador_clubs', 'selecciones.id_jug_club', '=', 'jugador_clubs.id_jug_club')
                ->join('jugadores', 'jugador_clubs.id_jugador', '=', 'jugadores.id_jugador')
                ->join('clubs', 'jugador_clubs.id_club', '=', 'clubs.id_club')
                ->join('fase_tipos', 'fases.id_fase', '=', 'fase_tipos.id_fase')
                ->join('tipos', 'fase_tipos.id_tipo', '=', 'tipos.id_tipo')
                ->where('fases.id_fase',$id_fase)
                ->where('tipos.id_tipo',"2")
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->select('fases.id_fase','fases.nombre_fase','tipos.id_tipo','clubs.nombre_club','clubs.logo','tabla_posicion_jugadors.*','jugadores.nombre_jugador','jugadores.apellidos_jugador')
                ->orderBy('tabla_posicion_jugadors.posicion','ASC')
                ->get();

            }
            $pdf = PDF::loadView('reportes.resultados.pdf_resultados2', ['dato'=>$dato,'gestion'=>$gestion,'disciplina'=>$disciplina]);
        }
        }
        
        
        
        return $pdf->stream('resultados.pdf');


    }

    public function consultar_gestiones($id){
        $id_ac = Admin_club::where('id_club', $id)->get();
        $gestiones = Inscripcion::where('id_adminClub', $id_ac->first()->id_adminClub)->get();
        $datos = [];
        if(count($gestiones)>0)
        {
            

            foreach($gestiones as $item)
            {
                array_push ($datos,['id_gestion'=>$item->id_gestion , 'nombre_gestion'=>$item->gestion->nombre_gestion]);
            }
        }

        return response()->json($datos);
    }
    public function consultar_disciplinas($id_club,$id_gestion){
        $discs = Club_Participacion::where('id_club', $id_club)->where('id_gestion',$id_gestion)->get();
        $datos = [];
        if(count($discs)>0)
        {
            

            foreach($discs as $item)
            {
                array_push ($datos,['id_club_part'=>$item->id_club_part , 'nombre_disc'=>$item->disciplina->nombre_disc." ".$item->disciplina->nombre_categoria($item->disciplina->categoria)]);
            }
        }

        return response()->json($datos);
    }
    public function consultar_disc($id_gestion){
        $discs = Participacion::where('id_gestion',$id_gestion)->get();
        $datos = [];
        if(count($discs)>0)
        {
            foreach($discs as $item)
            {
                array_push ($datos,['id_part'=>$item->id_participacion , 'nombre_disc'=>$item->disciplina->nombre_disc." ".$item->disciplina->nombre_categoria($item->disciplina->categoria)]);
            }
        }

        return response()->json($datos);
    }

    public function consultar_fases($id_part){
        $part = Participacion::find($id_part);
        $datos = [];
        if(count($part->fases)>0)
        {
            foreach($part->fases as $item)
            {
                array_push ($datos,['id_fase'=>$item->id_fase , 'nombre_fase'=>$item->nombre_fase]);
            }
        }

        return response()->json($datos);
    }

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
