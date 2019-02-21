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
            $tabla = DB::table('tabla_posicions')
            ->where('id_club_part',$id_club_part)
            ->where('id_fase',$id_fase)->get();
            if ($tabla->last() != null) {                
                $pjug = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club_part','=',$id_club_part)->where('id_fase',$id_fase)
                ->update(['pj' => $pjug+1]);
            }else {
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club_part = $id_club_part;
                $tabla_posicion->id_fase = $id_fase;
                $tabla_posicion->pj= 1;
                $tabla_posicion->save();
            }
        }
        $j = 2;
        for ($i=1; $i <= 2; $i++) { 
            $puntos = $request->get('punto'.$i);
            $observacion = $request->get('observacion'.$i);
            //para encuentro club participacion
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
            $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

            $id_club = $request->get('id_club'.$i);
            $id_club_part = Club_Participacion::where('id_club',$id_club)
                     ->where('id_disc',$id_disc)
                     ->where('id_gestion',$id_gestion)
                     ->get()->last()->id_club_part;

                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion,'resultado'=>"1"]);
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
public function reg_resultado_competicion(Request $request){
        if($request->ajax())
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
            ->join('eliminaciones','fases.id_fase','=','eliminaciones.id_fase')
            ->join('club_participaciones','eliminaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','club_participaciones.id_club')
            ->where('fases.id_fase','=',$id_fase)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')->distinct()->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function mostrar_resultado_ajax($id_encuentro){
        // $data = DB::table('fechas_grupos')
        //     ->join('fechas','fechas_grupos.id_fecha','fechas.id_fecha')
        //     ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
        //     ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
        //     ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
        //     ->join('clubs','club_participaciones.id_club','clubs.id_club')
        //     ->where('encuentros.id_encuentro',$id_encuentro)
        //     ->get();
        $data = DB::table('encuentros')
        ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
        ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->where('encuentros.id_encuentro',$id_encuentro)
        ->get();
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
    public function fixture(){        
        $fechas = Fecha::all(); 
        $pdf = PDF::loadView('grupo.fixture',['fechas'=>$fechas ]);
        return $pdf->download('fixture.pdf');
    }
}