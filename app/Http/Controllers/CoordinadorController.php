<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Club;
use Auth;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $id_coordinador = Auth::User()->id_administrador;
        //clubs de la tabla adminsclub
        $mis_clubs = Admin_Club::where('id_administrador',$id_coordinador)->where('estado_coordinador',1 )->get();
        //dd($clubs);
        //dd($id_coordinador);
        return view('coordinador.mis_clubs')->with('mis_clubs', $mis_clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ver_misGestiones()
    {
        $id_coordinador = Auth::User()->id_administrador;
        //clubs de la tabla adminsclub
        $mis_clubs = Admin_Club::where('id_administrador',$id_coordinador)->where('estado_coordinador',1 )->get();

        //dd($clubs);
        //dd($id_coordinador);
        return view('coordinador.mis_gestiones')->with('mis_clubs', $mis_clubs);
        
    }
    public function create()
    {
        //
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
