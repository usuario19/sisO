<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Encuentro;
use App\Models\Encuentro_Club_Participacion;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
class EncuentroController extends Controller
{
    public function index()
    {
       
 }
    public function create()
    {   
       
    }
    public function store(Request $request){
        $encuentro = new Encuentro($request->all());
        $encuentro->id_fecha = $request->get('id_fecha');
        $encuentro->save();

        $id_encuentro = DB::table('encuentros')
            ->select('id_encuentro')
            ->orderby('created_at','ASC')->get()->last()->id_encuentro;
         
        for ($i=1; $i <= 2; $i++) { 

            $id_club_part = DB::table('club_participaciones')
            ->where('id_gestion','=',$request->get('id_gestion'))
            ->where('id_disc','=',$request->get('id_disc'))
            ->where('id_club','=',$request->get('id_club'.$i))
            ->select('id_club_part')
            ->get()->last()->id_club_part;

            $encuentro_club_part = new Encuentro_Club_Participacion();
            $encuentro_club_part->puntos = '0';
            $encuentro_club_part->observacion = '0';
            $encuentro_club_part->resultado = '0';
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
    
}