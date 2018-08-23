<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdministradorRequest;
use Validator;
use Storage;
use Auth;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = DB::table('administradores')->get();
        return view('admin.listar_usr')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.reg_usr');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(AdministradorRequest $request)
    {
        //
        //$mensages = $request->validate();
        $datos = new Administrador($request->all());
        $datos->save();
         
        return redirect()->route('administrador.index');
       /* echo "hola";
        var_dump($request);S
    }*/
     public function store(AdministradorRequest $request)
    {
        //
        //$mensages = $request->ajax();
        $datos = new Administrador($request->all());
        $datos->save();
         
        return redirect()->route('administrador.index');
       /* echo "hola";
       if ($request->json()) {
            return response()->json(
                ["mensaje"=>$reuest->all()]);
           # code...
       }else
        return response($content = 'entroaaaaaeeeee');
        //dd($request);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
       // $usuario = DB::table('administradores')->where('id_administrador',$id)->get();

        $usuario = Administrador::find($id);
        //var_dump($usuario);
        return view('admin.edit_adm')->with('usuario',$usuario);//url
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
        $usuario = Administrador::find($id);
        $password = $usuario->password;

        if ($request->hasFile('foto_admin') && $usuario->foto_admin != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_admin);
        }

        $usuario->fill($request->all());

        if($request->password == "")
        {
            $usuario->password = $password;

        }
        $usuario->save();
        return redirect()->route('administrador.index');
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
        $usuario= Administrador::find($id);
        if ($usuario->foto_admin != "usuario-sin-foto.png") 
        {
           Storage::disk('fotos')->delete($usuario->foto_admin);
        }
        $usuario->delete();
        return redirect()->route('administrador.index');
    }
}
