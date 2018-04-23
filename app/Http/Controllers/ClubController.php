<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

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
        $clubs = DB::table('clubs')->get();
        $usuarios=DB::table('usuarios')->get();
        $coordinadores = array();
        $datos = array();

        foreach ($clubs as $club) {
            foreach ($usuarios as $usuario) {
        
             
                if ($club->coordinador=$usuario->id_usuario) {
                $coordinadores[$club->coordinador] = ($usuario->nombre." ".$usuario->apellidos);
                } 
            }
            }
       // foreach ($clubs as $club) {
         //   $datos = ($usuarios->nombre." ".$usuarios->apellidos);
        //}
        return view('club.listar_club')->with('clubs',$clubs,'coordinadores',$coordinadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos = DB::table('usuarios')->get();
        $usuarios = array();
        $i=0;

        foreach ($datos as $dato) {
            $usuarios[$dato->id_usuario] = ($dato->nombre." ".$dato->apellidos);
            $i++;
        }
        return view('club.reg_club')->with('usuarios', $usuarios);
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
        $datos = new Club($request->all());
        $datos->save();
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
