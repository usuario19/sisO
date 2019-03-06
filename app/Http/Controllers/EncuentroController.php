<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Encuentro;
use App\Models\Eliminacion;
use App\Models\Fecha;
use App\Models\Jugador;
use App\Models\Grupo;
use App\Models\Fase;
use App\Models\Encuentro_Club_Participacion;
use App\Models\Encuentro_Seleccion;
use App\Models\Tabla_Posicion;
use App\Models\Tabla_Posicion_Jugador;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use PDF;
use App\Models\Disciplina;
use App\Models\Club_Participacion;
class EncuentroController extends Controller
{
	public function __construct()
	{
	}
    public function index()
    {  
    }
    public function create()
    {   
    }
    public function store(Request $request){
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');

        $encuentro = new Encuentro($request->all());
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        
        for ($i=1; $i <= 2; $i++) { 
            $id_club_part = DB::table('club_participaciones')
            ->where('id_gestion','=',$id_gestion)
            ->where('id_disc','=',$id_disc)
            ->where('id_club','=',$request->get('id_club'.$i))
            ->select('id_club_part')
            ->get()->last()->id_club_part;
            $encuentro_club_part = new Encuentro_Club_Participacion();
            $encuentro_club_part->id_encuentro = $id_encuentro;
            $encuentro_club_part->id_club_part = $id_club_part;
            $encuentro_club_part->save();
        }        
        return redirect()->back();
    }
    public function store_competicion_serie(Request $request){
        $encuentro = new Encuentro($request->all());
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');
        
        $participantes = $request->get('id_participante');
       
        foreach($participantes as $participante) { 
            $id_seleccion = DB::table('jugadores')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('jugadores.id_jugador','=',$participante)
                ->select('selecciones.*')->get()->last()->id_seleccion;
           
            $encuentro_seleccions = new Encuentro_Seleccion();
            $encuentro_seleccions->id_encuentro = $id_encuentro;
            $encuentro_seleccions->id_seleccion = $id_seleccion;
            $encuentro_seleccions->save();
        }
        return redirect()->back();
    }
  
    public function destroy($id_encuentro){
        DB::table('encuentros')->where('id_encuentro', '=',$id_encuentro)->delete();
        return redirect()->back();            
    }

    public function reg_resultado(request $request){
        //return $request;
        $id_encuentro = $request->get('id_encuentro1');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');
        //registrar en la tabla de posicion
        for ($i = 1; $i <= 2 ; $i++) {
            $id_club = $request->get('id_club'.$i);
            
            $id_club_part = Club_Participacion::where('id_club',$id_club)
                ->where('id_disc',$id_disc)
                ->where('id_gestion',$id_gestion)
                ->get()->last()->id_club_part;
                //return dd($id_club_part);
            $tabla = DB::table('tabla_posicions')
            ->where('id_club_part',$id_club_part)
            ->where('id_fase',$id_fase)->get()->last();
            if (empty($tabla)){ 
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club_part = $id_club_part;
                $tabla_posicion->id_fase = $id_fase;
                $tabla_posicion->pj= 1;
                $tabla_posicion->save();               
                
            }else {
                $pjug = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club_part','=',$id_club_part)->where('id_fase',$id_fase)
                ->update(['pj' => $pjug+1]);
            }
        }
        $disc = Disciplina::find($request->get('id_disc'));
        $j = 2;
        for ($i=1; $i <= 2; $i++) { 
            $puntos = $request->get('punto'.$i);
            $observacion = $request->get('observacion'.$i);
            //para encuentro club participacion
            if ($disc->es_futbol($disc->id_disc)) {
                $goles = $request->get('goles'.$i);
                $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
                $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

                $id_club = $request->get('id_club'.$i);
                $id_club_part = Club_Participacion::where('id_club',$id_club)
                     ->where('id_disc',$id_disc)
                     ->where('id_gestion',$id_gestion)
                     ->get()->last()->id_club_part;

                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'goles'=>$goles,'observacion'=>$observacion]);
            } else {
                $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
                $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

                $id_club = $request->get('id_club'.$i);
                $id_club_part = Club_Participacion::where('id_club',$id_club)
                     ->where('id_disc',$id_disc)
                     ->where('id_gestion',$id_gestion)
                     ->get()->last()->id_club_part;

                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion]);
            }
            
                $puntos_total = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->select('puntos')->get()->last()->puntos;
                    $puntos_total = $puntos_total + $puntos;
                
                $puntos1 = $request->get('punto'.$i);
                $puntos2 = $request->get('punto'.$j);
                
                if ($puntos1 > $puntos2) {
                    $pg = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->select('pg')->get()->last()->pg;
                    $pg = $pg + 1;
                    Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->update(['puntos' => $puntos_total, 'pg'=>$pg]);
                }
                else {
                    if ($puntos1 < $puntos2) {
                        $pp = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                            ->select('pp')->get()->last()->pp;
                            $pp = $pp + 1;
                        Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                            ->update(['puntos' => $puntos_total,'pp'=>$pp]);   
                    }
                    else {
                        $pe = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                        ->select('pe')->get()->last()->pe;
                        $pe = $pe + 1;
                        
                        Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                        ->update(['puntos' => $puntos_total,'pe'=>$pe]);
                    }
                }
                    $j = 1;
        }
        return redirect()->back();  
    }
public function reg_res_competicion(Request $request){
        if($request->ajax()){
            $id_fase = $request->fase;
            $id_disc = $request->disc;
            $id_gestion = $request->gestion;
            $id_encuentro = $request->encuentro;
            foreach ($request->tabla as $jugador) {
                $id_seleccion = DB::table('jugador_clubs')
                                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                                ->where('jugador_clubs.id_jugador',$jugador[0])
                                ->where('jugador_clubs.id_club',$jugador[1])
                                ->where('club_participaciones.id_club',$jugador[1])
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                Encuentro_Seleccion::where('id_seleccion',$id_seleccion)->where('id_encuentro',$id_encuentro)
                            ->update(['posicion' => $jugador[2]]);
                $tabla = DB::table('tabla_posicion_jugadors')
                    ->where('id_seleccion',$id_seleccion)
                    ->where('id_fase',$id_fase)->get()->last();
                //return $tabla;
                if ($tabla != null) {
                    $cantidad_encuentros = Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)->get()->last()->cantidad_encuentros;
                    Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                            ->update(['cantidad_encuentros' => $cantidad_encuentros+1]);
                }
                else{
                    $tabla_posicion_jugador = new Tabla_Posicion_Jugador();
                    $tabla_posicion_jugador->id_fase = $id_fase;
                    $tabla_posicion_jugador->id_disc = $id_disc;
                    $tabla_posicion_jugador->id_seleccion = $id_seleccion;
                    $tabla_posicion_jugador->cantidad_encuentros = 1;
                    $tabla_posicion_jugador->save();
                }
            }
            
        }
        return $request;  
    }
    public function select_contrincante($id_club, $id_grupo){
        $clubsParaEncuentro = DB::table('grupo_club_participaciones')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')
            ->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function select_contrincante_eliminacion($id_club, $id_fase){
        $clubsParaEncuentro = DB::table('fases')
            ->join('eliminaciones','fases.id_fase','eliminaciones.id_fase')
            ->join('club_participaciones','eliminaciones.id_club_part','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('fases.id_fase',$id_fase)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')->distinct()->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function mostrar_resultado_ajax($id_encuentro){
        $data = DB::table('encuentros')
        ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
        ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->where('encuentros.id_encuentro',$id_encuentro)
        ->get();
        return response()->json($data);
    }
    public function mostrar_resultado_futbol_ajax($id_enc){
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        $id_encuentro_club_part1=0;
        $id_encuentro_club_part2=0;
        $puntos1=null;
        $puntos2=null;
        $observacion1=null;
        $observacion2=null;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
                $id_encuentro_club_part1 = $value->id_encuentro_club_part;
                $puntos1 = $value->puntos;
                $observacion1 = $value->observacion;

            } else {
                $club2=$value->id_club_part;
                $id_encuentro_club_part2 = $value->id_encuentro_club_part;
                $puntos2 = $value->puntos;
                $observacion2 = $value->observacion;

            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;
        $goles1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->select('encuentro_seleccions.posicion')->sum('encuentro_seleccions.posicion');
        $goles2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->select('encuentro_seleccions.posicion')->sum('encuentro_seleccions.posicion');
        $data = array('club1'  => $goles1,  
                'club2' => $goles2,
                'id_encuentro_club_part1'=> $id_encuentro_club_part1,
                'id_encuentro_club_part2'=> $id_encuentro_club_part2,
                'puntos1'=>$puntos1,
                'puntos2'=>$puntos2,
                'observacion1'=>$observacion1,
                'observacion2'=>$observacion2,
            );
        
       // return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));
        
        return response()->json($data);
    }
    public function mostrar_resultado_competicion_ajax($id_encuentro){
        $data = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
        ->where('encuentro_seleccions.id_encuentro',$id_encuentro)
        ->get();
        return response()->json($data);
    }
    public function fixture_porfecha($id_fecha){        
        $fecha = Fecha::find($id_fecha); 
        $pdf = PDF::loadView('grupo.fixture',['fecha'=>$fecha]);
        return $pdf->download('fixture.pdf');
    }
    public function seleccion_series($id_enc,$id_gestion,$id_disc,$id_fase,$id_grupo){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase= Fase::find($id_fase);
        $grupo= Grupo::find($id_grupo);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;
        //return dd($id_club2);
        
        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
        if ($disciplina->es_futbol($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_series_futbol',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
       
        } else {
            return view('encuentro.jugadores_seleccionados_series',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
            
        }
    }
    public function seleccion_eliminacion($id_enc,$id_gestion,$id_disc,$id_fase){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase= Fase::find($id_fase);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;

        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
        return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
    }
    
    public function agregar_jugador_encuentro(request $request){
        $id_encuentro = $request->get('id_encuentro');
        // $id_gestion = $request->get('id_gestion');
        // $id_disc = $request->get('id_disc');
        // $id_club = $request->get('id_club');
        $id_jugador = $request->get('id_jugador');

        foreach($id_jugador as $id_jug){

            $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jug)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;

            $encuentro_selec = new Encuentro_Seleccion();
            $encuentro_selec->id_encuentro = $id_encuentro;
            $encuentro_selec->id_seleccion = $id_seleccion;
            $encuentro_selec->save();
        }
        return redirect()->back();
    }
    public function eliminar_jugador_encuentro($id_encuentro,$id_jugador){
        $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
        $id_encuentro_seleccion = Encuentro_Seleccion::
            where('id_encuentro',$id_encuentro)
            ->where('id_seleccion',$id_seleccion)->get()->last()->id_encuentro_seleccion;
            $enc_selec = Encuentro_Seleccion::find($id_encuentro_seleccion)->delete();
        return redirect()->back();
    }
    public function reg_gol_jugador_ajax($id_enc,$id_jug){
        $jugador = Jugador::find($id_jug);
        return $jugador;
    }
    public function store_gol_jugador(request $request){
        $id_encuentro = $request->get('id_encuentro');
        $id_jugador = $request->get('id_jugador');
        $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
            
        $cant_goles = $request->get('goles');
        $enc_selec = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
            ->where('id_encuentro',$id_encuentro)->update(['posicion'=>$cant_goles]);
        return redirect()->back();
    }
}