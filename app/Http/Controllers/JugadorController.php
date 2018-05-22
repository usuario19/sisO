<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Admin_club;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JugadorRequest;
use Storage;
use Validator;
use Auth;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Jugador::all();

        $ultima_gestion = Gestion::all()->last()->id_gestion;

        $inscritos = Inscripcion::where('id_gestion',$ultima_gestion)->get();
        //dd($inscritos);
        //$clubs = DB::table('inscripciones')->where('id_gestion',$ultima_gestion)->get();
        //dd($clubs);

        return view('jugador.listar_jugadores')->with('usuarios',$usuarios)->with('inscritos',$inscritos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::User()->tipo == "Coordinador")
        {
            $id_coordinador = Auth::User()->id_administrador;
                //clubs de la tabla adminsclub
            $mis_clubs = Admin_Club::where('id_administrador',$id_coordinador)->where('estado_coordinador',1 )->get();
            return view('jugador.reg_jugador')->with('mis_clubs',$mis_clubs);
        }else{
            
            return view('jugador.reg_jugador');
        }
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
        $ci_jugador = $request->ci_jugador;
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
