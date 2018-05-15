<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JugadorRequest;
use Storage;
use Validator;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table('jugadores')->get();
        return view('jugador.listar_jugadores')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jugador.reg_jugador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JugadorRequest $request)
    {
        $datos = new Jugador($request->all());
        $datos->save();
         
        return redirect()->route('jugador.index');
     }
        /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function mostrarJugador()
    {
        //
        $usuarios = DB::table('jugadores')->get();
        return view('jugador.listar_jugadores')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Jugador::find($id);
        //var_dump($usuario);
        return view('jugador.edit_jugador')->with('usuario',$usuario);//url
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
        $usuario = Jugador::find($id);

        if ($request->hasFile('foto_jugador') && $usuario->foto_jugador != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_jugador);
        }

        $usuario->fill($request->all());
        $usuario->save();
        return redirect()->route('jugador.index');
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
        $usuario= Jugador::find($id);
        if ($usuario->foto_jugador != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_jugador);
        }
        
        $usuario->delete();
        return redirect()->route('jugador.index');
    }
}
