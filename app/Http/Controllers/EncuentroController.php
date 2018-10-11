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
            if (Tabla_Posicion::where('id_club','=',$id_club)) {
                $pj = Tabla_Posicion::where('id_club','=',$id_club)->get()->last()->pj;
                Tabla_Posicion::where('id_club','=',$id_club)
                ->update(['pj' => $pj+1]);
            }
            else {
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
        $encuentro = Encuentro::find($id_encuentro);
        return view('encuentro.reg_resultado_encuentro')->with('encuentro',$encuentro);
    }
    public function reg_resultado(request $request){
        return dd($request);
        $id_encuentro = $request->get('id_encuentro');
        
    }

    
}