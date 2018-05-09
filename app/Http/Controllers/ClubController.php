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
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar clubs
        $clubs = DB::table('adminclubs')
        ->join('administradores','adminClubs.id_administrador','=','administradores.id_administrador')
        ->join('clubs','adminclubs.id_club','=','clubs.id_club')
        
        ->select('clubs.*','administradores.nombre','administradores.apellidos')
        ->get();

        return view('club.listar_club')->with('clubs',$clubs);

    }

    public function create()
    {   
        $administradores=array();
        $datos = DB::table('administradores')->get();
        
            foreach ($datos as $dato) {
                $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
            }
        if (empty($administradores)) {
            //Alert()->message('falta coordinado','hola');
            //return redirect('/')->with('success','fdsafsd');}
            Alert::info('No hay coordinadores', 'Agregue primero un coordinador');                      }
        else{

            return view('club.reg_club')->with('administradores', $administradores);    
        }
            
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = new Club($request->all());
        $datos->save();

        $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');

        $ultimo_club = Club::all();

        $ultimo = $ultimo_club->last()->id_club;

        $admin_club->id_club = $ultimo;
        //$datos->()->attach($);
        $admin_club->save();

        return redirect()->route('club.index');
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
        //para editar el club
        //$clubs = DB::table('club')->get();
        $datos = DB::table('adminclubs')
        ->join('administradores','adminClubs.id_administrador','=','administradores.id_administrador')
        ->join('clubs','adminclubs.id_club','=','clubs.id_club')
        ->where('clubs.id_club', $id)
        ->select('clubs.*','administradores.nombre','administradores.apellidos','administradores.id_administrador')

        ->get();
        //$clubs = array();
        //$clubs = $datos;
        foreach ($datos as $dato) {
            $club = $dato;
        }
        $datos2 = DB::table('administradores')->get();
        foreach ($datos2 as $datos) {
            $administradores[$datos->id_administrador] = ($datos->nombre." ".$datos->apellidos);
            //$i++;
        }
        //return dd($club);
        return view('club.editar_club')->with('club',$club)->with('administradores',$administradores);
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
        if($request->hasFile('logo'))
        {   $logo_antiguo = DB::table('clubs')
                            ->where('id_club',$id)
                            ->select('logo')
                            ->get();
            foreach ($logo_antiguo as $logo) {
                if ($foto_disc->foto_disc != 'usuario-sin-foto.png') {
                Storage::disk('logos')->delete($logo->logo);  }  
            }
            $logo = $request->file('logo');
            $nombre_logo= time().'-'.$logo->getClientOriginalExtension();
            Storage::disk('logos')->put($nombre_logo, file_get_contents($logo));

            //Image::make($avatar)->resize(300, 300)->save(public_path('/storage/logo/'.$nombre_logo));

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
        return redirect()->route('club.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo_antiguo = DB::table('clubs')
                            ->where('id_club',$id)
                            ->select('logo')
                            ->get();
            foreach ($logo_antiguo as $logo) {
                if ($logo->logo!='usuario-sin-foto.png') {
                    Storage::disk('logos')->delete($logo->logo);    
                }
        }
        DB::table('clubs')->where('id_club', '=',$id)->delete();
        return redirect()->route('club.index'); 
    }
    
    //para llenar la tabla inscripcion
    //inscribir un club a una gestion, a la gestion actual
    public function inscribir($id){
        $id_gestion = Gestion::all()->last()->id_gestion;
        //$ultima_gestion = Gestion::all();
        //$valor = $ultima_gestion->last()->id_gestion;
        //return dd($id_gestion);
        $inscripcion = new inscripcion();
        $inscripcion->id_gestion = $id_gestion;
        $inscripcion->id_club = $id;
        $inscripcion->save();
        return redirect()->route('club.index');
    }
    public function inscrito($id){
        $id_gestion = Gestion::all()->last()->id_gestion;
        $inscripcion = DB::table('inscripcion')
        ->select('inscripcion.*')
        ->where([
            ['inscripcion.id_gestion', '=', $id_gestion],
            ['inscripcion.id_club', '=', $id],
        ])
        ->get();
        //dd($inscripcion);
        if (empty($inscripcion)) {
            return false;
        }
        return true;
        
    }
}
