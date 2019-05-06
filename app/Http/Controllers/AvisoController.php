<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Models\Participacion;
use App\Models\Aviso;
use App\Http\Requests\AvisoRequest;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $avisos = Aviso::all()->sortByDesc('fecha_ini_aviso');
        return view("avisos.index")->with('avisos',$avisos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gestiones = Gestion::where('estado_gestion',1)->get() ;

        return view("avisos.aviso_crear")->with('gestiones',$gestiones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvisoRequest $request)
    {
        //

        $texto = $request->contenido;
        $texto1 = "<img ";
        $texto2 = "<img class='img-fluid mx-auto' ";
        $contenido = str_replace($texto1, $texto2, $texto);
        /* echo $contenido; */

        $datos = new Aviso($request->all());
        $datos->contenido = $contenido;
        $now = new \DateTime();
        $now->format('H:i:s');
        $datos->hora_publicacion = $now;
        $datos->save();
        flash('Se registro exitosamente el nuevo aviso.')->success()->important();
            return redirect()->route('aviso.index');
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
        $aviso = Aviso::find($id);
        $gestiones = Gestion::where('estado_gestion',1)->get() ;
        return view('avisos.aviso_editar')->with('aviso', $aviso)->with('gestiones',$gestiones);
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
            'titulo'=>'required',
            'fecha_ini_aviso'=>'required|date',
            'fecha_ini_fin'=>'date',
            'contenido'=>'required',
        ]);
        $aviso = Aviso::find($id);
        $aviso->fill($request->all());

        $texto = $request->contenido;
        $texto1 = "<img src";
        $texto2 = "<img class='img-fluid mx-auto' src";
        $contenido = str_replace($texto1, $texto2, $texto);
        $aviso->contenido = $contenido;
        
        $aviso->save();
        flash('Se actualizo correctamente el aviso. ')->info()->important();
        return redirect()->route('aviso.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario= Aviso::find($id);
        $usuario->delete();
        flash('Se elimino exitosamente el aviso.')->info()->important();
        
        return redirect()->route('aviso.index');
    }

    public function consultar_participacion($id){
        $participaciones = Participacion::where('id_gestion', $id)->get();
        $datos = [];
        if(count($participaciones)>0)
        {
            

            foreach($participaciones as $item)
            {
                array_push ($datos,['id_disc'=>$item->id_disciplina , 'nombre_disc'=>$item->disciplina->nombre_disc." ".$item->disciplina->nombre_categoria($item->disciplina->categoria)]);
            }
        }

        return response()->json($datos);
    }
}
