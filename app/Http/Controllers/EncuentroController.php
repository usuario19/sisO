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
use App\Models\Tabla_Posicion;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use PDF;
use App\Models\Disciplina;
class EncuentroController extends Controller
{
    public function index()
    {  
    }
    public function create()
    {   
    }
    public function store(Request $request){
        $id_fecha = $request->get('id_fecha');
        $encuentro = new Encuentro($request->all());
        $encuentro->id_fecha = $id_fecha;
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');
        $id_fase = Fecha::where('id_fecha','=',$id_fecha)->select('id_fase')->get()->last()->id_fase;
        
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
            $tabla = DB::table('tabla_posicions')->where('id_club','=',$id_club)->get();
            //return dd($tabla);
            if ($tabla->last() != null) {                
                $pjug = Tabla_Posicion::where('id_club','=',$id_club)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club','=',$id_club)
                ->update(['pj' => $pjug+1]);
            }else {
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club = $request->get('id_club'.$i);
                $tabla_posicion->id_fase = $id_fase;
                $tabla_posicion->save();
            }
        }
        return redirect()->back();
    }
    public function store_eliminacion(Request $request){
        
        $encuentro = new Encuentro($request->all());
        $encuentro->id_fecha = $request->get('id_fecha');
        $encuentro->save();
        $id_encuentro = $encuentro->id_encuentro;
       
        for ($i=1; $i <= 2; $i++) { 
                $id_club_part = DB::table('club_participaciones')
            ->where('id_gestion','=',$request->get('id_gestion'))
            ->where('id_disc','=',$request->get('id_disc'))
            ->where('id_club','=',$request->get('id_club'.$i))
            ->select('id_club_part')
            ->get()->last()->id_club_part;
            //return dd($id_club_part);
        $encuentro_club_part = new Encuentro_Club_Participacion();
        $encuentro_club_part->id_encuentro = $id_encuentro;
        $encuentro_club_part->id_club_part = $id_club_part;
        $encuentro_club_part->save(); 
        }
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function mostrarClub()
    {
        
    }
    public function edit($id)
    {
       
    }
   
    public function update(Request $request)
    {
        
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
    public function reg_resultado(request $request){
        $id_encuentro = $request->get('id_encuentro');

        $clubs = DB::table('encuentros')
                    ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
                    ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentros.id_encuentro',$id_encuentro)
                    ->get()->toArray();
        $id_fase = DB::table('fechas')
                ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
                ->where('id_encuentro',$id_encuentro)
                ->get()->last()->id_fase;
     
         $j = 1;
        for ($i=0; $i < 2; $i++) { 
            $puntos = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
            $observacion = $request->get('observacion'.$clubs[$i]->{'id_encuentro_club_part'});
            
            //para encuentro club participacion
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$clubs[$i]->{'id_encuentro_club_part'});
            //return dd($id_encuentro_club_part);
            Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                ->update(['puntos' => $puntos, 'observacion'=>$observacion,'resultado'=>"1"]);
            //para tabla de posiciones
            $id_club = $clubs[$i]->id_club;
            
            $puntos_total = Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->select('puntos')->get()->last()->puntos;
            $puntos_total = $puntos_total + $puntos;
            
            $puntos1 = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
            $puntos2 = $request->get('punto'.$clubs[$j]->{'id_encuentro_club_part'});
            if ($puntos1 > $puntos2) {
                $pg = Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->select('pg')->get()->last()->pg;
                $pg = $pg + 1;
                //return dd($pg);
                Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->update(['puntos' => $puntos_total, 'pg'=>$pg]);
                
            }
            else {
                if ($puntos1 < $puntos2) {
                    $pp = Tabla_Posicion::where('id_club', $id_club)
                        ->where('id_fase', $id_fase)
                        ->select('pp')->get()->last()->pp;
                        $pp = $pp + 1;
                    Tabla_Posicion::where('id_club', $id_club)
                        ->where('id_fase', $id_fase)
                        ->update(['puntos' => $puntos_total,'pp'=>$pp]);   
                }
                else {
                    $pe = Tabla_Posicion::where('id_club', $id_club)
                    ->where('id_fase', $id_fase)
                    ->select('pe')->get()->last()->pe;
                    
                    $pe = $pe + 1;
                    
                    Tabla_Posicion::where('id_club', $id_club)
                    ->where('id_fase', $id_fase)
                    ->update(['puntos' => $puntos_total,'pe'=>$pe]);
                        
                }
                
            }
            $j = 0;
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

        // $clubs = array();
        // foreach ($clubsParaEncuentro as $club) {
        //     $clubs[$club->id_club] = ($club->nombre_club);
        // }
        return response()->json($clubsParaEncuentro);

        $clubs = DB::table('encuentros')
                    ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
                    ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentros.id_encuentro',$id_encuentro)
                    ->get()->toArray();
        $id_fase = DB::table('fechas')
                ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
                ->where('id_encuentro',$id_encuentro)
                ->get()->last()->id_fase;
     
         $j = 1;
        for ($i=0; $i < 2; $i++) { 
            $puntos = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
            $observacion = $request->get('observacion'.$clubs[$i]->{'id_encuentro_club_part'});
            
            //para encuentro club participacion
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$clubs[$i]->{'id_encuentro_club_part'});
            //return dd($id_encuentro_club_part);
            Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                ->update(['puntos' => $puntos, 'observacion'=>$observacion,'resultado'=>"1"]);
            //para tabla de posiciones
            $id_club = $clubs[$i]->id_club;
            
            $puntos_total = Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->select('puntos')->get()->last()->puntos;
            $puntos_total = $puntos_total + $puntos;
            
            $puntos1 = $request->get('punto'.$clubs[$i]->{'id_encuentro_club_part'});
            $puntos2 = $request->get('punto'.$clubs[$j]->{'id_encuentro_club_part'});
            if ($puntos1 > $puntos2) {
                $pg = Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->select('pg')->get()->last()->pg;
                $pg = $pg + 1;
                //return dd($pg);
                Tabla_Posicion::where('id_club', $id_club)
                ->where('id_fase', $id_fase)
                ->update(['puntos' => $puntos_total, 'pg'=>$pg]);
                
            }
            else {
                if ($puntos1 < $puntos2) {
                    $pp = Tabla_Posicion::where('id_club', $id_club)
                        ->where('id_fase', $id_fase)
                        ->select('pp')->get()->last()->pp;
                        $pp = $pp + 1;
                    Tabla_Posicion::where('id_club', $id_club)
                        ->where('id_fase', $id_fase)
                        ->update(['puntos' => $puntos_total,'pp'=>$pp]);   
                }
                else {
                    $pe = Tabla_Posicion::where('id_club', $id_club)
                    ->where('id_fase', $id_fase)
                    ->select('pe')->get()->last()->pe;
                    
                    $pe = $pe + 1;
                    
                    Tabla_Posicion::where('id_club', $id_club)
                    ->where('id_fase', $id_fase)
                    ->update(['puntos' => $puntos_total,'pe'=>$pe]);
                        
                }
                
            }
            $j = 0;
        }
        return redirect()->back();  
    }
}