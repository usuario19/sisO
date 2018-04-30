<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use Image;
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
        //$clubs = Club::with(['admin_Clubs:id_club,clubs', 'administradores:id_administrador,admin_Club'])->get();
        //$clubs = DB::table('club')->administradores->nombre->get();
        //$clubs = App\Models\Club::has('administradores')->get();
       // $clubs = DB::table('clubs')->get();
        //$administradores=DB::table('administradores')->get();

        //$id_club = $clubs->last()->id_club;

        //$ultima_gestion = Gestion::all();
        //$valor = $ultima_gestion->last()->id_gestion;
        //$coordinadores = array();
        //$datos = array();

       /*** foreach ($clubs as $club) {
            foreach ($administradores as $administrador) {             
                if ($club->coordinador=$administradores->id_administrador) {
                $coordinadores[$club->coordinador] = ($administrador->nombre." ".$administrador->apellidos);
                } 
            }
            }**/
       // foreach ($clubs as $club) {
         //   $datos = ($usuarios->nombre." ".$usuarios->apellidos);


        return view('club.listar_club')->with('clubs',$clubs);

    }

    
    public function create()
    {
        $datos = DB::table('administradores')->get();
        //$usuarios = array();
        //$i=0;

        foreach ($datos as $dato) {
            $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
            //$i++;
        }
        return view('club.reg_club')->with('administradores', $administradores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /**$datos = new Club();
        $datos->nombre_club = $request->get('nombre_club');
        $datos->ciudad = $request->get('ciudad');
        $datos->logo = $request->get('logo');
        $datos->ciudad = $request->get('ciudad');
        $datos->descripcion_club = $request->get('descripcion_club');
        $datos->save();
**/     
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
                Storage::disk('logos')->delete($logo->logo);    
            }
            
            //return var_dump($logo_antiguo[]);
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
        //DB::table('clubs')->delete();
        //$club = Club::find($id);
        //$club->delete();
        $logo_antiguo = DB::table('clubs')
                            ->where('id_club',$id)
                            ->select('logo')
                            ->get();
            foreach ($logo_antiguo as $logo) {
                Storage::disk('logos')->delete($logo->logo);    
        }
        DB::table('clubs')->where('id_club', '=',$id)->delete();
        return redirect()->route('club.index'); 
    }
}
