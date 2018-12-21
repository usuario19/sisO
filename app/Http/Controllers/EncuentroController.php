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
        
        for ($i = 1; $i <= 2 ; $i++) {
            $id_club = $request->get('id_club'.$i);
            $id_club_part = Club_Participacion::where('id_club',$id_club)
                ->where('id_disc',$id_disc)
                ->where('id_gestion',$id_gestion)
                ->get()->last()->id_club_part;
            $tabla = DB::table('tabla_posicions')
            ->where('id_club_part',$id_club_part)
            ->where('id_fase',$id_fase)->get();
            if ($tabla->last() != null) {                
                $pjug = Tabla_Posicion::where('id_club_part','=',$id_club_part)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club_part','=',$id_club_part)
                ->update(['pj' => $pjug+1]);
            }else {
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club_part = $id_club_part;
                $tabla_posicion->save();
            }
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
        //return dd($participantes);
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
            //insertar jugadores en la tabla de posicion de los jugadores
            $tabla = DB::table('tabla_posicion_jugadors')->where('id_seleccion','=',$id_seleccion)->where('id_disc','=',$id_disc)->get();
            if ($tabla->last() == null) { 
                $tabla_posicion = new Tabla_Posicion_Jugador();
                $tabla_posicion->id_seleccion = $id_seleccion;
                $tabla_posicion->id_disc = $id_disc;
                $tabla_posicion->save();
            }
        }
        return redirect()->back();
    }
    public function store_eliminacion(Request $request){
        $encuentro = new Encuentro($request->all());
        $encuentro->save();
        $id_encuentro = $encuentro->id_encuentro;
       
        for ($i=1; $i <= 2; $i++) { 
                $id_club_part = DB::table('club_participaciones')
            ->where('id_gestion','=',$request->get('id_gestion'))
            ->where('id_disc','=',$request->get('id_disc'))
            ->where('id_club','=',$request->get('id_club'.$i))
            ->select('id_club_part')
            ->get()->last()->id_club_part;
        $encuentro_club_part = new Encuentro_Club_Participacion();
        $encuentro_club_part->id_encuentro = $id_encuentro;
        $encuentro_club_part->id_club_part = $id_club_part;
        $encuentro_club_part->save(); 
        }
        for ($i = 1; $i <= 2 ; $i++) {
            $id_club = $request->get('id_club'.$i);
            $tabla = DB::table('tabla_posicions')->where('id_club','=',$id_club)->where('id_disc','=',$id_disc)->get();
            if ($tabla->last() != null) {                
                $pjug = Tabla_Posicion::where('id_club','=',$id_club)->where('id_disc','=',$id_disc)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club','=',$id_club)->where('id_disc','=',$id_disc)
                ->update(['pj' => $pjug+1]);
            }else {
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club = $request->get('id_club'.$i);
                $tabla_posicion->id_disc = $id_disc;
                $tabla_posicion->save();
            }
        }
        return redirect()->back();
    }
  
    public function destroy($id_encuentro){
        DB::table('encuentros')->where('id_encuentro', '=',$id_encuentro)->delete();
        return redirect()->back();            
    }
    public function fixture(){        
        $fechas = Fecha::all(); 
        $pdf = PDF::loadView('grupo.fixture',['fechas'=>$fechas ]);
        return $pdf->download('fixture.pdf');
    }
    public function mostrar_resultado($id_encuentro){
        $datos_menu = DB::table('encuentros')
                ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
                ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                ->where('encuentros.id_encuentro',$id_encuentro)
                ->select('club_participaciones.*')
                ->get()->last();
        
        $gestion = Gestion::find($datos_menu->id_gestion);
        $disciplina = Disciplina::find($datos_menu->id_disc);
        $encuentro = Encuentro::find($id_encuentro);
        //return dd($datos_menu->id_gestion);
        return view('encuentro.reg_resultado_encuentro',compact('encuentro','gestion','disciplina'));
    }
    public function mostrar_resultado_competicion($id_encuentro){
       return "en construccion ggg";
    }
    public function reg_resultado(request $request){
        //return dd($request);
        $id_encuentro = $request->get('id_encuentro1');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $clubs = DB::table('encuentros')
                    ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
                    ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentros.id_encuentro',$id_encuentro)
                    ->get()->toArray();
        $id_encuentro_club_part1 = $request->get('id_encuentro_club_part1');
        $id_encuentro_club_part2 = $request->get('id_encuentro_club_part2');
        $puntos_ant1 = -1;
        $puntos_ant2 = -1;
        for ($i=0; $i < 2; $i++) { 
            if ($i=0) {
                $puntos_ant1 = Encuentro_Club_Participacion::find($request->get('id_encuentro_club_part1'))->id_encuentro_club_part;
                $puntos_ant2 = Encuentro_Club_Participacion::find($request->get('id_encuentro_club_part2'))->id_encuentro_club_part;
            }           
        }
        $j = 1;
        for ($i=0; $i < 2; $i++) { 
            $puntos = $request->get('puntos'.$i);
            $observacion = $request->get('observacion'.$i);
            //para encuentro club participacion
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
            $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

            $id_club = $clubs[$i]->id_club;
            $id_club_part = Club_Participacion::where('id_club',$id_club)
                     ->where('id_disc',$id_disc)
                     ->where('id_gestion',$id_gestion)
                     ->get()->last()->id_club_part;
           
            if ($encuentro_club_part->resultado = 1) {
                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion,'resultado'=>"1"]);
                //para tabla de posiciones
                 //return dd($id_club_part);
                 //return dd($"puntos);
                $puntos_total = Tabla_Posicion::where('id_club_part',$id_club_part)
                    ->select('puntos')->get()->last()->puntos;
                $puntos_total = $puntos_total + $puntos-$puntos_ant1;
                
                $puntos1 = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
                $puntos2 = $request->get('punto'.$clubs[$j]->{'id_encuentro_club_part'});
                if ($i = 0) {
                    if ($puntos_ant1 > $puntos_ant2 && $puntos1 < $puntos2) {
                        $pg = Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->select('pg')->get()->last()->pg;
                        $pg = $pg - 1;
                        $pp = Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->select('pp')->get()->last()->pp;
                        $pp = $pp + 1;
                        Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->update(['puntos' => $puntos_total, 'pg'=>$pg, 'pp'=>$pp]);
                    }
                    else {
                        if ($puntos_ant1 < $puntos_ant2 && $puntos1 > $puntos2) {
                            $pp = Tabla_Posicion::where('id_club_part',$id_club_part)
                                ->select('pp')->get()->last()->pp;
                                $pp = $pp - 1;
                            $pg = Tabla_Posicion::where('id_club_part',$id_club_part)
                                ->select('pg')->get()->last()->pg;
                                $pg = $pg + 1;
                            Tabla_Posicion::where('id_club', $id_club)
                                ->where('id_disc', $id_disc)
                                ->update(['puntos' => $puntos_total, 'pg'=>$pg, 'pp'=>$pp]);   
                        }
                    }
                }
                else{
                    if ($puntos_ant1 < $puntos_ant2 && $puntos1 > $puntos2) {
                        $pg = Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->select('pg')->get()->last()->pg;
                        $pg = $pg - 1;
                        $pp = Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->select('pp')->get()->last()->pp;
                        $pp = $pp + 1;
                        Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->update(['puntos' => $puntos_total, 'pg'=>$pg, 'pp'=>$pp]);
                    }
                    else {
                        if ($puntos_ant1 > $puntos_ant2 && $puntos1 < $puntos2) {
                            $pp = Tabla_Posicion::where('id_club_part',$id_club_part)
                                ->select('pp')->get()->last()->pp;
                                $pp = $pp - 1;
                            $pg = Tabla_Posicion::where('id_club_part',$id_club_part)
                                ->select('pg')->get()->last()->pg;
                                $pg = $pg + 1;
                            Tabla_Posicion::where('id_club', $id_club)
                                ->where('id_disc', $id_disc)
                                ->update(['puntos' => $puntos_total, 'pg'=>$pg, 'pp'=>$pp]);   
                        }
                    }   
                }
                    $j = 0;
            }
            else {
                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion,'resultado'=>"1"]);
                    
                $puntos_total = Tabla_Posicion::where('id_club_part',$id_club_part)
                    ->select('puntos')->get()->last()->puntos;
                $puntos_total = $puntos_total + $puntos;
                
                $puntos1 = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
                $puntos2 = $request->get('punto'.$clubs[$j]->{'id_encuentro_club_part'});
                if ($puntos1 > $puntos2) {
                    $pg = Tabla_Posicion::where('id_club_part',$id_club_part)
                    ->select('pg')->get()->last()->pg;
                    $pg = $pg + 1;
                    Tabla_Posicion::where('id_club_part',$id_club_part)
                    ->update(['puntos' => $puntos_total, 'pg'=>$pg]);
                }
                else {
                    if ($puntos1 < $puntos2) {
                        $pp = Tabla_Posicion::where('id_club_part',$id_club_part)
                            ->select('pp')->get()->last()->pp;
                            $pp = $pp + 1;
                        Tabla_Posicion::where('id_club', $id_club)
                            ->where('id_disc', $id_disc)
                            ->update(['puntos' => $puntos_total,'pp'=>$pp]);   
                    }
                    else {
                        $pe = Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->select('pe')->get()->last()->pe;
                        $pe = $pe + 1;
                        
                        Tabla_Posicion::where('id_club_part',$id_club_part)
                        ->update(['puntos' => $puntos_total,'pe'=>$pe]);
                    }
                }
                    $j = 0;
            }
        }
        return redirect()->back();  
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
            ->join('eliminaciones','fases.id_fase','=','eliminaciones.id_fase')
            ->join('club_participaciones','eliminaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','club_participaciones.id_club')
            ->where('fases.id_fase','=',$id_fase)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')->distinct()->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function mostrar_resultado_ajax($id_encuentro){
        $data = DB::table('fechas_grupos')
            ->join('fechas','fechas_grupos.id_fecha','fechas.id_fecha')
            ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
            ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('encuentros.id_encuentro',$id_encuentro)
            ->get();
        return response()->json($data);
    }
}