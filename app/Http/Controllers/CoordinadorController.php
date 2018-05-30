<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Club;
use App\Models\Jugador_Club;
use Illuminate\Support\Facades\DB;

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
        $array =array();
        $i=0;
        foreach ($mis_clubs as $club) {
            # code...
            $array[$i]=$club->id_adminClub;
            $i++;
        }

        //$gestiones = Inscripcion::whereIn('id_adminClub',$array);

        //dd($clubs);
        //dd($id_coordinador);
        return view('coordinador.mis_gestiones')->with('mis_clubs', $mis_clubs);
        
        //$mis_gestiones = DB::table('')
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
        $mis_jugadores = Jugador_Club::where('id_club',$id)->get();
        $mi_club = DB::table('clubs')->select('nombre_club','logo')->where('id_club',$id)->get();
        //dd($mis_jugadores);
        //dd($mi_club);
        //dd('hola');
        return view('coordinador.mis_jugadores')->with('mis_jugadores', $mis_jugadores)->with('mi_club',$mi_club); 
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
    public function eliminar($id,$id_club)
    {
        //
        $usuario= Jugador_Club::where('id_jugador',$id)->where('id_club',$id_club)->get();

        if ($usuario->jugador->foto_jugador != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->jugador->foto_jugador);
        }
        $id_club = $usuaio->id_club;
        $usuario->delete();
        return redirect()->route('coordinador.show',$id_club);

    }

    public function ver_misJugadores()
    {
        $id_coordinador = Auth::User()->id_administrador;
        //clubs de la tabla adminsclub
         $todo_clubs = DB::table('clubs')
        ->join('adminclubs','adminClubs.id_club','=','clubs.id_club')
        ->where('adminClubs.id_administrador','=',$id_coordinador)
        ->select('clubs.id_club','nombre_club')
        ->get();

        $clubs = array('0' => 'Mostrar Todo');

        foreach ($todo_clubs as $valor) {
            $clubs[$valor->id_club]=$valor->nombre_club;
        }

        //dd($clubs);
        //dd($id_coordinador);
        return view('coordinador.todo_jugadores')->with('clubs', $clubs);
    }

    public function filtrar(Request $request)
    {
        /*$id_coordinador = Auth::User()->id_administrador;
        //clubs de la tabla adminsclub
         $todo_clubs = DB::table('clubs')
        ->join('adminclubs','adminClubs.id_club','=','clubs.id_club')
        ->where('adminClubs.id_administrador','=',$id_coordinador)
        ->select('clubs.id_club','nombre_club')
        ->get();

        $clubs = array('0' => 'Mostrar Todo');

        foreach ($todo_clubs as $valor) {
            $clubs[$valor->id_club]=$valor->nombre_club;
        }

        //dd($clubs);
        //dd($id_coordinador);
        //return view('coordinador.todo_jugadores')->with('clubs', $clubs);
        $club=$request->club;
        $genero=$request->genero;*/
        
        if($request->club == 0 && $request->genero == 2 )
        {
            $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->get();
            dd($usuarios);
        }
        else{
           
           $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->where('clubs.id_club',$club)
            ->where('jugadores.genero_jugador', $genero)
            ->select('jugadores.*','clubs.logo','clubs.id_club')
            ->get(); 

        }
        return view('coordinador.todo_jugadores')->with('usuarios', $usuarios)->with('clubs', $clubs);
        //dd($datos);
        //dd('hola');
    }
}
