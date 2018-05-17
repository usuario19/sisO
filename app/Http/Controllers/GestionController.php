<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Models\Disciplina;
use App\Models\Participacion;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones = DB::table('gestiones')->get();
        return view('admin.listar_gestion')->with('gestiones',$gestiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $disciplina = DB::table('disciplinas')->get();
        if (empty($disciplina)) {
            Alert::warning('Primero debe crear disciplinas','');
            return redirect()->route('disciplina.create');
        }
        else{
            return view('admin.reg_gest')->with('disciplina', $disciplina);
        }
        
        //return var_dump($disciplina);
    }
    public function store(Request $request)
    {
        $gestion = new Gestion;
        $gestion->nombre_gestion = $request->get('nombre');
        $gestion->fecha_ini = $request->get('fechaIni');
        $gestion->fecha_fin = $request->get('fechaFin');
        $gestion->desc_gest = $request->get('descripcion');
        $gestion->estado_gestion = 1;
        $gestion->save();

        $ultima_gestion = Gestion::all();
        $valor = $ultima_gestion->last()->id_gestion;
        
        $disciplinas =$request->get('id_disciplinas');
        foreach ($disciplinas as $disc) {
            $datos = new participacion;
            $datos->id_gestion=$valor;
            $datos->id_disciplina=$disc;
            $datos->save();
        }
        return redirect()->route('gestion.index');
       /* foreach ($request as $valor => $disciplina) {
            $id_disc = $request->get('disciplina');
            return var_dump($id_disc);
        }
        

        $gestion->save();*/
        
        //$gestion = Disciplina::find($id_disc);
        //$gestion = Disciplina::where($request->get('disciplina'));
        //$gestion->disciplinas()->attach($request->get('disciplina'),['id_disc','state'=>true]);
        //return var_dump($gestion);
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
    
    public function mostrarGestion()
    {
        $gestiones = DB::table('gestiones')->get();
        return view('admin.listar_gestion')->with('gestiones',$gestiones);
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
        DB::table('gestiones')->where('id_gestion', '=',$id)->delete();
        return redirect()->route('gestion.index'); 
    }
}
