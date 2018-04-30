<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use Image;
use Storage;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = DB::table('disciplinas')->get();
        //$usuarios=DB::table('administradores')->get();
        //$coordinadores = array();
        //$datos = array();
        //foreach ($clubs as $club) {
        //    foreach ($usuarios as $usuario) {             
        //        if ($club->coordinador = $usuario->id_usuario) {
        //        $coordinadores[$club->coordinador] = ($usuario->nombre." ".$usuario->apellidos);
        //        } 
        //    }
        //}

        return view('disciplina.listar_disciplina')->with('disciplinas',$disciplinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('disciplina.reg_disc');
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
        $datos = new Disciplina($request->all());
        $datos->save();
        return redirect()->route('disciplina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //para listar disciplina

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
        //$datos = new Disciplina($request->all());
        //$datos->save();
        //return var_dump($datos);
        $datos = DB::table('disciplinas')
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
