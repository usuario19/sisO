<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
class datosclubController extends Controller {
   
    public function datos()
    {
	   $club_id = Input::get('club');
  
       $club = Club::find($id_club);
	   
	 
		
        $datos = array(
            'success' => true,
            'id_club' => $id_club,
			'nombre_club' => $club->nombre_club,
            'ciudad' => $club->ciudad,
			'descripcion_club' => $club->descripcion_club,
			
        );
        
        return Response::json($datos);
		
    }
}
?>