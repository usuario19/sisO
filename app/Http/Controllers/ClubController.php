<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {/**
        //listar clubs
        $clubs = DB::table('clubs')->get();
        $administradores=DB::table('administradores')->get();
        $coordinadores = array();
        $datos = array();

       /*** foreach ($clubs as $club) {
            foreach ($administradores as $administrador) {             
                if ($club->coordinador=$administradores->id_administrador) {
                $coordinadores[$club->coordinador] = ($administrador->nombre." ".$administrador->apellidos);
                } 
            }
            }**/
       // foreach ($clubs as $club) {
         //   $datos = ($usuarios->nombre." ".$usuarios->apellidos);
        //}**/
/**
        return view('club.listar_club')->with('clubs',$clubs,'coordinadores',$coordinadores);
**/
    }

    
    public function create()
    {
        //
        $datos = DB::table('administradores')->get();
        $usuarios = array();
        $i=0;

        foreach ($datos as $dato) {
            $administradores[$dato->id_administrador] = ($dato->nombre." ".$dato->apellidos);
            $i++;
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
        $admin_club->id_administrador = $request->get('id_coordinador');

        $ultimo_club = Club::all();
        $ultimo=0;
        $ultmo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo +1;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
