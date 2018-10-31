<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Jugador_Club;
use App\Models\Jugador;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
class ClubController extends Controller
{
    public function index(){
        //listar clubs
        $administradores = array();
        $datos = DB::table('administradores')->get();

        foreach ($datos as $dato) {
                $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
        }

        $clubs = DB::table('adminclubs')
        ->join('administradores','adminClubs.id_administrador','=','administradores.id_administrador')
        ->join('clubs','adminclubs.id_club','=','clubs.id_club')
        
        ->select('clubs.*','administradores.nombre','administradores.apellidos')
        ->paginate(15);

        $gestiones = DB::table('gestiones')
                    ->join('inscripciones','gestiones.id_gestion','=','inscripciones.id_gestion')
                    ->get();

        return view('club.listar_club')->with('clubs',$clubs)->with('gestiones',$gestiones)->with('administradores',$administradores);
    }

    public function clubs_principal(){
        $clubs = Club::all();
        return view('principal.listar_club')->with('clubs',$clubs);
    }
    
    public function create()
    {   
        $administradores = array();
        $datos = DB::table('administradores')->get();
        foreach ($datos as $dato) {
                $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
        }
        if (empty($administradores)) {
            //Alert()->message('falta coordinado','hola');
            //Alert()->info('No hay coordinadores', 'Agregue primero un coordinador');
            //return redirect('/')->with('success','fdsafsd');}
            //Alert::info('No hay coordinadores', 'Agregue primero un coordinador'); 
            Alert::warning('','');
            return redirect()->route('administrador.create');
        }else {
            return view('club.reg_club')->with('administradores', $administradores);    
        }
    }
    public function store(Request $request)
    {
        $datos = new Club($request->all());
        $datos->save();
        $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');
        $ultimo_club = Club::all();
        $ultimo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo;
        $admin_club->estado_coordinador = 1;
        $admin_club->save();
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function mostrarClub()
    {
        //
        $clubs = DB::table('adminclubs')
        ->join('administradores','adminClubs.id_administrador','=','administradores.id_administrador')
        ->join('clubs','adminclubs.id_club','=','clubs.id_club')
        
        ->select('clubs.*','administradores.nombre','administradores.apellidos')
        ->get();
        //para verificar si esta inscrito
        $id_gestion = Gestion::all()->last()->id_gestion;
        //return var_dump($id_gestion);
        $inscrito = DB::table('inscripciones')
        ->join('clubs','clubs.id_club','=','inscripciones.id_club')
        ->join('gestiones','gestiones.id_gestion','=','inscripciones.id_gestion')
        ->where('gestiones.id_gestion','=',$id_gestion)
        ->select('inscripciones.id_club')
        ->get();
        $coordinadores = DB::table('administradores')
                        ->get();
        $administradores = array();
        $datos = DB::table('administradores')->get();
        foreach ($datos as $dato) {
                $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
        }
        return view('club.listar_club')->with('clubs',$clubs)->with('inscrito',$inscrito)->with('administradores',$administradores);
    }


    public function edit($id){
        $datos = DB::table('adminclubs')
        ->join('administradores','adminClubs.id_administrador','=','administradores.id_administrador')
        ->join('clubs','adminclubs.id_club','=','clubs.id_club')
        ->where('clubs.id_club', $id)
        ->select('clubs.*','administradores.nombre','administradores.apellidos','administradores.id_administrador')
        ->get();
        foreach ($datos as $dato) {
            $club = $dato;
        }
        $datos2 = DB::table('administradores')->get();
        foreach ($datos2 as $datos) {
            $administradores[$datos->id_administrador] = ($datos->nombre." ".$datos->apellidos);
        }   
        return response()->json($club);
        //return view('club.editar_club')->with('club',$club)->with('administradores',$administradores);
    }
    public function update2(Request $request, $id)
    {
        if($request->hasFile('logo'))
        {   $logo_antiguo = DB::table('clubs')
                            ->where('id_club',$id)
                            ->select('logo')
                            ->get();
            foreach ($logo_antiguo as $logo) {
                if ($logo->logo != 'sin_imagen.png') {
                Storage::disk('logos')->delete($logo->logo);  }  
            }
            $logo = $request->file('logo');
            $nombre_logo= time().'-'.$logo->getClientOriginalExtension();
            Storage::disk('logos')->put($nombre_logo, file_get_contents($logo));
            DB::table('clubs')
                ->where('id_club', $id)
                ->update(['nombre_club' => $request->get('nombre_club'),
                            'ciudad'=>$request->get('ciudad'),
                            'logo'=>$nombre_logo,
                            'descripcion_club'=>$request->get('descripcion_club')
                        ]);
            DB::table('adminclubs')
                ->where('id_club',$id)
                ->update(['id_administrador'=>$request->get('id_administrador')
                ]);    
        
        }
        else{
            DB::table('clubs')
                ->where('id_club', $id)
                ->update(['nombre_club' => $request->get('nombre_club'),
                            'ciudad'=>$request->get('ciudad'),
          
                            'descripcion_club'=>$request->get('descripcion_club')
                        ]);
            DB::table('adminclubs')
                ->where('id_club',$id)
                ->update(['id_administrador'=>$request->get('id_administrador')
                ]); 
        }
        return redirect()->route('club.index');
    }
    public function update(Request $request)
    {
        if($request->hasFile('logo'))
        {   $logo_antiguo = DB::table('clubs')
                            ->where('id_club', $request->get('id_club'))
                            ->select('logo')
                            ->get();
            foreach ($logo_antiguo as $logo) {
                if ($logo->logo != 'sin_imagen.png') {
                Storage::disk('logos')->delete($logo->logo);  }  
            }
            $logo = $request->file('logo');
            $nombre_logo= time().'-'.$logo->getClientOriginalExtension();
            Storage::disk('logos')->put($nombre_logo, file_get_contents($logo));
            //Image::make($avatar)->resize(300, 300)->save(public_path('/storage/logo/'.$nombre_logo));
            DB::table('clubs')
                ->where('id_club', $request->get('id_club'))
                ->update(['nombre_club' => $request->get('nombre_club'),
                            'ciudad'=>$request->get('ciudad'),
                            'logo'=>$nombre_logo,
                            'descripcion_club'=>$request->get('descripcion_club')
                        ]);
            DB::table('adminclubs')
                ->where('id_club', $request->get('id_club'))
                ->update(['id_administrador'=>$request->get('id_administrador')
                ]);    
        
        }
        else{
            DB::table('clubs')
                ->where('id_club', $request->get('id_club'))
                ->update(['nombre_club' => $request->get('nombre_club'),
                            'ciudad'=>$request->get('ciudad'),
          
                            'descripcion_club'=>$request->get('descripcion_club')
                        ]);
            DB::table('adminclubs')
                ->where('id_club', $request->get('id_club'))
                ->update(['id_administrador'=>$request->get('id_administrador')
                ]); 
        }
        return redirect()->route('club.index');
    }
    public function destroy(request $request,$id_club){
                $logo_antiguo = DB::table('clubs')
                            ->where('id_club',$id_club)
                            ->select('logo')
                            ->get();
                foreach ($logo_antiguo as $logo) {
                    if ($logo->logo!='sin_imagen.png') {
                        Storage::disk('logos')->delete($logo->logo);    
                    }
                }
            DB::table('clubs')->where('id_club', '=',$id_club)->delete();
            return redirect()->back();                 
    }
    
    //para llenar la tabla inscripcion
    //inscribir un club a una gestion con un coordinador
    
    /**public function inscribir($id,$id_gestion){
        $id_adminClub = DB::table('adminClubs')
                        ->where('adminClubs.id_club',$id)
                        //->where('adminClubs.id_gestion',$id_gestion)
                        ->where('adminClubs.estado_coordinador',1)
                        ->select('adminClubs.id_adminClub')
                        ->get();
        $inscrip = new Inscripcion();
        $inscrip->id_gestion = $id_gestion;
        $inscrip->id_adminClub = $id_adminClub[0]->{'id_adminClub'};
        $inscrip->save();
        return redirect()->back();
    }**/
    public function desinscribir($id,$id_gestion){
        $id_adminClub = DB::table('adminClubs')
                        ->where('adminClubs.id_club',$id)
                        //->where('adminClubs.id_gestion',$id_gestion)
                        ->where('adminClubs.estado_coordinador',1)
                        ->select('adminClubs.id_adminClub')
                        ->get();
        DB::table('inscripciones')
        ->where('id_adminClub', '=',$id_adminClub[0]->{'id_adminClub'})
        ->where('id_gestion', '=',$id_gestion)
        ->delete();
        return redirect()->back(); 
    }
    public function listar_jugadores($id_gestion,$id_club){
        $gestion = Gestion::find($id_gestion);
        //$jugadores = Jugador_Club::where('id_club','=',$id_club)->get();
        $jugadores = DB::table('jugadores')
                ->join('jugador_clubs','jugadores.id_jugador','=','jugador_clubs.id_jugador')
                ->where('jugador_clubs.id_club','=',$id_club)
                ->paginate(15);
        return view('club.listar_jugadores')->with('jugadores',$jugadores)->with('gestion',$gestion);
    }
}