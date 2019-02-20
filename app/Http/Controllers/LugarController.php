<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Centro::All();
        return view('centro.index')->with('datos',$datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->validate($request,[
            'nombre_centro'=>'required',
            'ubicacion_centro'=>'required',
        ]);
        $datos = new Centro($request->all());
        $datos->save();
        flash('Se registro correctamente el centro.')->success()->important();
        /* $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');
        $ultimo_club = Club::all();
        $ultimo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo;
        $admin_club->estado_coordinador = 1;
        $admin_club->save(); */
        return redirect()->back();
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
        $this->validate($request,[
            'nombre_centro'=>'required',
            'ubicacion_centro'=>'required',
        ]);
        $datos = Centro::find($id);
        $datos->fill($request->all());
        $datos->save();
        flash('Se actualizo correctamente el centro.')->info()->important();
        /* $admin_club = new Admin_club();
        $admin_club->id_administrador = $request->get('id_administrador');
        $ultimo_club = Club::all();
        $ultimo = $ultimo_club->last()->id_club;
        $admin_club->id_club = $ultimo;
        $admin_club->estado_coordinador = 1;
        $admin_club->save(); */
        return redirect()->back();
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
        $dato= Centro::find($id);
        
        $dato->delete();
        flash('Se elimino correctamente el centro.')->info()->important();
        
        return redirect()->back();
    }
}
