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
        $mi_club = DB::table('clubs')->select('id_club','nombre_club','logo')->where('id_club',$id)->get();
        //dd($mis_jugadores);
        //dd($mi_club);
        //dd('hola');
        return view('coordinador.mis_jugadores')->with('mis_jugadores', $mis_jugadores)->with('mi_club',$mi_club[0]); 
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
        $id_clubs = array();
        $i=0;
        foreach ($todo_clubs as $valor) {
            $clubs[$valor->id_club]=$valor->nombre_club;
            $id_clubs[$i]=$valor->id_club;
            $i++; 
        }

        $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->whereIn('jugador_clubs.id_club',$id_clubs)
            ->select('jugadores.*','jugador_clubs.id_jug_club','clubs.id_club','clubs.nombre_club')
            ->orderBy('jugadores.ci_jugador')
            ->get();

        //dd($clubs);
        //dd($id_coordinador);
        return view('coordinador.ajaxfiltrar')->with('clubs', $clubs)->with('usuarios', $usuarios);
    }

    public function filtrar(Request $request)
    {
         $id_coordinador = Auth::User()->id_administrador;
        //clubs de la tabla adminsclub
         $todo_clubs = DB::table('clubs')
        ->join('adminclubs','adminClubs.id_club','=','clubs.id_club')
        ->where('adminClubs.id_administrador','=',$id_coordinador)
        ->select('clubs.id_club','nombre_club')
        ->get();

        //$clubs = array('0' => 'Mostrar Todo');
        $id_clubs = array();
        $i=0;
        foreach ($todo_clubs as $valor) {
            //$clubs[$valor->id_club]=$valor->nombre_club;
            $id_clubs[$i]=$valor->id_club;
            $i++; 
        }
       
        
        if($request->club == "0" && $request->genero == "0" )
        {
            $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->whereIn('jugador_clubs.id_club',$id_clubs)
            ->select('jugadores.*','jugador_clubs.id_jug_club','clubs.id_club','clubs.nombre_club')
            ->orderBy('jugadores.ci_jugador')
            ->get();
        }
        elseif($request->club == "0" )
        {
           
           $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->whereIn('jugador_clubs.id_club',$id_clubs)
            ->where('jugadores.genero_jugador',$request->genero)
            ->select('jugadores.*','jugador_clubs.id_jug_club','clubs.id_club','clubs.nombre_club')
            ->orderBy('jugadores.ci_jugador')
            ->get(); 
            //dd($usuarios);

        }
        elseif ($request->genero == "0") {
            # code...
            $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->where('jugador_clubs.id_club',$request->club)
            ->select('jugadores.*','jugador_clubs.id_jug_club','clubs.id_club','clubs.nombre_club')
            ->orderBy('jugadores.ci_jugador')
            ->get();
        }
        else{
            $usuarios = DB::table('jugadores')
            ->join('jugador_clubs','jugador_clubs.id_jugador','=','jugadores.id_jugador')
            ->join('clubs','clubs.id_club','=','jugador_clubs.id_club')
            ->select('jugadores.*','clubs.*')
            ->where('jugadores.genero_jugador',$request->genero)
            ->where('jugador_clubs.id_club',$request->club)
            ->select('jugadores.*','jugador_clubs.id_jug_club','clubs.id_club','clubs.nombre_club')
            ->orderBy('jugadores.ci_jugador')
            ->get();
        }
        //echo "hola";

        //return view('coordinador.plantilla.tabla_jugadores')->with('usuarios');
       
        //dd($usuarios);
       //dd($club, $genero);
        $datos = "";
        
        foreach ($usuarios as $usuario) {
            # code...
            $datos .= "<tr><td>".$usuario->id_jugador."</td>";
            $datos .= "<td>".$usuario->nombre_club."</td>";
            $datos .= "<td><img class="."'rounded mx-auto d-block'". "src='/storage/fotos/".$usuario->foto_jugador."' height=".'"50px"'."width=".'"50px"'."></td>";
            $datos .= "<td>".$usuario->ci_jugador."</td>";
            $datos .=  "<td>".$usuario->apellidos_jugador." ".$usuario->nombre_jugador."</td>";
            if($usuario->genero_jugador == "2")
                       $datos .= "<td>M</td>";
            else
                        $datos .= "<td>F</td>" ;
            $datos .= "<td>".$usuario->email_jugador."</td>";
            $datos .= "<td>". $usuario->fecha_nac_jugador."</td>";
            $datos .=  "<td class="."d-inline-block text-truncate"." style="."max-width: 150px;>".$usuario->descripcion_jugador."</td>";
            $datos .=  "<td><a href=".route('jugador.edit',$usuario->id_jugador)." class=".'"btn btn-warning"'.">Editar</a></td>";
            $datos .= "<td>
                <a href=".route('jugador.destroy',$usuario->id_jugador)."  class="."'btn btn-danger'"." data-toggle="."modal data-target='#eliminar".$usuario->id_jugador."'"." >Eliminar</a>".
                "<div class='modal fade'"." id="."'eliminar".$usuario->id_jugador."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>SisO:</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
    
                      <div class='modal-body'>
                        Esta seguro de querer eliminar al usuario?
                      </div>
    
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
    
                        <a href=".route('jugador.destroy',$usuario->id_jugador)." class='btn btn-primary'>Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td></tr>";

        }
        echo $datos;
   }
   
}
