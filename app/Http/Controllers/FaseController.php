<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fase;
use App\Models\Gestion;
use App\Models\Grupo;
use App\Models\Club;
use App\Models\Fecha;
use App\Models\Disciplina;
use App\Models\Encuentro;
use App\Models\Eliminacion;
use App\Models\Participacion;
use App\Models\Fase_Tipo;
use App\Models\Centro;
use Illuminate\Support\Facades\DB;

class FaseController extends Controller
{
    public function index()
    {

    }
    public function create($id_disc, $id_gestion)
    {
        $tipos = DB::table('tipos')->get();
        return view('fases.reg_fase')->with('tipos', $tipos)->with('id_disc', $id_disc)->with('id_gestion', $id_gestion);
    }
    public function store(Request $request)
    {
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_participacion = DB::table('participaciones')
            ->where('participaciones.id_disciplina', $id_disc)
            ->where('participaciones.id_gestion', $id_gestion)
            ->select('participaciones.id_participacion')
            ->get()->toArray();
        $fases = new Fase;
        $fases->nombre_fase = $request->get('nombre');
        $fases->id_participacion = $id_participacion[0]->{'id_participacion'};
        $fases->save();

        $fase_tipos = new Fase_Tipo;
        $fase_tipos->id_fase = Fase::all()->last()->id_fase;
        $fase_tipos->id_tipo = $request->get('tipo');
        $fase_tipos->save();

        return redirect()->back();
    }
    public function listar_grupos($id_fase, $id_gestion, $id_disc)
    {
        $gestion = Gestion::find($id_gestion);
        $grupos = DB::table('grupos')
            ->where('grupos.id_fase', '=', $id_fase)
            ->paginate(10);
        $disciplina = Disciplina::find($id_disc);
        //$fase = Fase::where("id_fase","=",$id_fase)->first();
        $fase = Fase::find($id_fase);
        return view('grupo.listar_grupos')->with('grupos', $grupos)->with('fase', $fase)->with('gestion', $gestion)->with('disciplina', $disciplina);
        //return dd($fase);
    }
    //lista de encuentros y clubs inscritos
    public function eliminacion_encuentro($id_fase, $id_gestion, $id_disc)
    {   $centros_lista = Centro::all();
        $centros = array();
        foreach($centros_lista as $centro){
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $fechas = Fecha::where('id_fase', '=', $id_fase)->get();

        $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        //clubs inscritos en esa fase
        $clubs = DB::table('fases')
            ->join('eliminaciones', 'fases.id_fase', '=', 'eliminaciones.id_fase')
            ->join('club_participaciones', 'eliminaciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
            ->where('eliminaciones.id_fase', '=', $id_fase)
            ->get();
        //revisar para que sirve
        $clubsParaEncuentro = array();
        foreach ($clubs as $club) {
            $clubsParaEncuentro[$club->id_club] = ($club->nombre_club);
        }
        $clubsDisponibles = DB::table('clubs')
            ->join('club_participaciones', 'clubs.id_club', '=', 'club_participaciones.id_club')
            ->where('club_participaciones.id_gestion', '=', $id_gestion)
            ->where('club_participaciones.id_disc', '=', $id_disc)
            ->whereNotIn('clubs.id_club',$clubs->pluck('id_club')->toArray())
            ->get();
        //$encuentros = Encuentro::all();
        return view('fases.listar_encuentros_eliminacion',compact('centros','clubs','clubsDisponibles','gestion','disciplina','fase','fechas','fechas2','clubsParaEncuentro'));
    }
    public function eliminacion_encuentro_competicion($id_fase, $id_gestion, $id_disc)
    {   $centros_lista = Centro::all();
        $centros = array();
        foreach($centros_lista as $centro){
            $centros[$centro->id_centro] = $centro->nombre_centro;
        }
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $fechas = Fecha::where('id_fase', '=', $id_fase)->get();
        // $fechasLista = DB::table('fechas')
        //     ->join('fechas_grupos','fechas.id_fecha','fechas_grupos.id_fecha')
        //     ->join('grupos','fechas_grupos.id_grupo','grupos.id_grupo')
        //     ->where('grupos.id_grupo','=',$id_grupo)
        //     ->select('fechas.*')->get();
        // $fechasArreglo = array();
        // foreach ($fechasLista as $fecha) {
        // $fechasArreglo[$fecha->id_fecha] = ($fecha->id_fecha);
        // }
        // $fechas = Fecha::whereIn('id_fecha',$fechasArreglo)->get();
        // $fechas2 = array();
        foreach ($fechas as $fecha) {
            $fechas2[$fecha->id_fecha] = ($fecha->nombre_fecha);
        }
        //clubs inscritos en esa fase
        $clubs = DB::table('fases')
            ->join('eliminaciones', 'fases.id_fase', '=', 'eliminaciones.id_fase')
            ->join('club_participaciones', 'eliminaciones.id_club_part', '=', 'club_participaciones.id_club_part')
            ->join('clubs', 'club_participaciones.id_club', '=', 'clubs.id_club')
            ->where('eliminaciones.id_fase', '=', $id_fase)
            ->get();
        //revisar para que sirve
       
        $clubsDisponibles = DB::table('clubs')
            ->join('club_participaciones', 'clubs.id_club', '=', 'club_participaciones.id_club')
            ->where('club_participaciones.id_gestion', '=', $id_gestion)
            ->where('club_participaciones.id_disc', '=', $id_disc)
            ->whereNotIn('clubs.id_club',$clubs->pluck('id_club')->toArray())
            ->get();
       //desde aki
     
        // $clubsInscritos = DB::table('grupo_club_participaciones')
        //     ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
        //     //->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
        //     ->select('grupo_club_participaciones.id_club_part')
        //     ->get()->toArray();
        // $lista = array();
        //                 foreach ($clubsInscritos as $club) {
        //                     $lista[] = $club->id_club_part;
        //                 }
        //                 $centrosLista = Centro::all();
        //                 $centros = array();
        //                 foreach ($centrosLista as $centro) {
        //                     $centros[$centro->id_centro] = $centro->nombre_centro;
        //                 }
     
        // $clubsDisponibles = DB::table('clubs')
        //     ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
        //     ->where('club_participaciones.id_gestion','=',$id_gestion)
        //     ->where('club_participaciones.id_disc','=',$id_disc)
        //     ->whereNotIn('club_participaciones.id_club_part',$lista)
        //     ->get();
        
       
        $encuentros = DB::table('fases')
                ->join('fechas','fases.id_fase','fechas.id_fase')
                ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
                ->join('encuentro_seleccions','encuentros.id_encuentro','encuentro_seleccions.id_encuentro')
                ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                //->where('encuentros.id_fecha',$id_fecha)
                ->where('fases.id_fase','=',$id_fase)
                ->select('encuentros.*')
                ->get();
        // $lista_encuentros = array();
        // foreach ($encuentros as $encuentro) {
        //     $lista_encuentros[] = $encuentro->id_encuentro;
        // }
        $participantes = DB::table('jugadores')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                // ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->where('club_participaciones.id_disc',$id_disc)
                // ->where('grupo_club_participaciones.id_grupo',$id_grupo)
                ->select('jugadores.*')->get();
        return view('fases.list_encuentros_elim_comp',compact('participantes','encuentros','centros','clubs','clubsDisponibles','gestion','disciplina','fase','fechas','fechas2'));
    }
    public function store_club_eliminacion(Request $request)
    {
        $clubs = $request->get('id_club');
        foreach ($clubs as $club) {
            $datos = new eliminacion;
            $datos->id_fase = $request->get('id_fase');
            $id_club_part = DB::table('club_participaciones')
                ->where('club_participaciones.id_gestion', '=', $request->get('id_gestion'))
                ->where('club_participaciones.id_disc', '=', $request->get('id_disciplina'))
                ->where('club_participaciones.id_club', '=', $club)->get()->last()->id_club_part;
            $datos->id_club_part = $id_club_part;
            $datos->save();
        }
        return redirect()->back();
    }
    public function eliminar_club_eliminacion($id_fase, $id_club_part){
        DB::table('eliminaciones')->where('id_fase', '=', $id_fase)->where('id_club_part','=',$id_club_part)->delete();
        return redirect()->back();
    }
    public function select_fases($id_disc){
        $fases = DB::table('fases')
            ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')
            ->where('participaciones.id_disciplina','=',$id_disc)
            ->get();
        return $fases; 
    }
}

