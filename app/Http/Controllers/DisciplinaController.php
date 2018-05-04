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
        $datos = DB::table('disciplinas')->get();
        foreach ($datos as $dato) {
            $disciplina = $dato;
        }
        return view('disciplina.editar_disc')->with('disciplina',$disciplina);
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
        if($request->hasFile('foto_disc'))
        {   
            $foto_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('foto_disc')
                            ->get();
            foreach ($foto_antiguo as $foto_disc) {
                    Storage::disk('foto_disc')->delete($foto_disc->foto_disc);    
            }  
            $foto_nueva = $request->file('foto_disc');
                    $nombre_foto = time().'-'.$foto_nueva->getClientOriginalExtension();
                    Storage::disk('foto_disc')->put($nombre_foto, file_get_contents($foto_nueva));



            if ($request->hasFile('reglamento_disc')) {
                $reglamento_antiguo = DB::table('disciplinas')
                                    ->where('id_disc',$id)
                                    ->select('reglamento_disc')
                                    ->get();
                foreach ($reglamento_antiguo as $reglamento_disc) {
                        Storage::disk('archivos')->delete($reglamento_disc->reglamento_disc);
                }    
                $reglamento_nuevo = $request->file('reglamento_disc');
                $nombre_reglamento= time().'-'.$reglamento_nuevo->getClientOriginalExtension();
                Storage::disk('archivos')->put($nombre_reglamento, file_get_contents($reglamento_nuevo));

                
                DB::table('disciplinas')
                    ->where('id_disc', $id)
                    ->update(['nombre_disc' => $request->get('nombre_disc'),
                            'foto_disc'=>$nombre_foto,
                            'reglamento_disc'=>$nombre_reglamento,
                            'descripcion_disc'=>$request->get('descripcion_disc')
                        ]); 
            }                  
        }
        return redirect()->route('disciplina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('foto_disc')
                            ->get();
            foreach ($foto_antiguo as $foto_disc) {
                Storage::disk('foto_disc')->delete($foto_disc->foto_disc);    
        }

        $reglamento_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('reglamento_disc')
                            ->get();
            foreach ($reglamento_antiguo as $reglamento_disc) {
                Storage::disk('archivos')->delete($reglamento_disc->reglamento_disc);    
        }
        DB::table('disciplinas')->where('id_disc', '=',$id)->delete();
        return dd($reglamento_disc);
        //return redirect()->route('disciplina.index'); 
    }
}
