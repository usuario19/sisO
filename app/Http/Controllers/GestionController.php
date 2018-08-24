<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gestion;
use App\Models\Disciplina;
use App\Models\Club;
use App\Models\Participacion;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GestionController extends Controller
{
    public function index(){
        $gestiones = DB::table('gestiones')->get();
        $disciplina = DB::table('disciplinas')->get();
        return view('admin.listar_gestion')->with('gestiones',$gestiones)->with('disciplina', $disciplina);
    }
    public function create(){
        $disciplina = DB::table('disciplinas')->get();
        if (empty($disciplina)) {
            Alert::warning('Primero debe crear disciplinas','');
            return redirect()->route('disciplina.create');
        }
        else{
            return view('admin.reg_gest')->with('disciplina', $disciplina);
        }
    }
    public function store(Request $request){
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
    }

    public function show($id){
        $gestiones = Gestion::all();
        //$gestiones2 = array();
        //foreach ($gestiones2 as $gestion) {
          //  $gestiones[$id_gestion] = $gestion->nombre_gestion;
        //return dd($gestion);
        //}
        //return dd($gestiones);
        $gestion = Gestion::find($id);
        return view('plantillas.menus.menu_gestion')->with('gestion',$gestion)->with('gestiones',$gestiones);
    }
    
    public function mostrarGestion(){
        $gestiones = DB::table('gestiones')->get();
        return view('admin.listar_gestion')->with('gestiones',$gestiones);
    }
    public function configurar($id_gestion){
        $gestiones2 = Gestion::select('nombre_gestion')->get();
        $gestiones = array();
        foreach ($gestiones2 as $gestion) {
            $gestiones[] = $gestion->nombre_gestion;
        }
        $gestion = Gestion::find($id_gestion);
        $disciplinasInscrito = DB::table('gestiones')
            ->join('participaciones','gestiones.id_gestion','=','participaciones.id_gestion')
            ->join('disciplinas','participaciones.id_disciplina','=','disciplinas.id_disc')
            ->where('gestiones.id_gestion','=',$id_gestion)
            ->get();
        $disciplinas = array();
        foreach ($disciplinasInscrito as $disciplina) {
            $disciplinas[] = $disciplina->id_disc;
        }
        $disciplinasNoInscrito = DB::table('Disciplinas')
            ->whereNotIn('disciplinas.id_disc',$disciplinas)
            ->get();
        //$disciplinas = Disciplina::get();
        //return dd($disciplinasInscrito );
        return view('gestiones.configurar_gestion')->with('gestion',$gestion)->with('disciplinasInscrito',$disciplinasInscrito)->with('disciplinasNoInscrito',$disciplinasNoInscrito)->with('gestiones',$gestiones);
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){ 
        //return dd($Request);
        DB::table('gestiones')
                ->where('id_gestion', $id)
                ->update(['nombre_gestion' => $request->get('nombre_gestion'),
                            'fecha_ini'=>$request->get('fecha_ini'),
                            'fecha_fin'=>$request->get('fecha_fin'),
                            'desc_gest'=>$request->get('descripcion')
                      ]);
        
        return redirect()->back(); 
    }

    public function destroy($id){
        DB::table('gestiones')->where('id_gestion', '=',$id)->delete();
        return redirect()->route('gestion.index'); 
    }

    public function clubs($id_gestion){
        //clubs inscritos en una determinada gestion
        $clubs_inscritos = DB::table('clubs')
                        ->join('adminClubs','clubs.id_club','=','adminClubs.id_club')
                        ->join('inscripciones','adminClubs.id_adminClub','=','inscripciones.id_adminClub')
                        ->join('gestiones','inscripciones.id_gestion','=','gestiones.id_gestion')
                        ->where('gestiones.id_gestion',$id_gestion)
                        ->select('clubs.*','gestiones.nombre_gestion')
                        ->get();
        $inscritos = DB::table('clubs')
                        ->join('adminClubs','clubs.id_club','=','adminClubs.id_club')
                        ->join('inscripciones','adminClubs.id_adminClub','=','inscripciones.id_adminClub')
                        ->join('gestiones','inscripciones.id_gestion','=','gestiones.id_gestion')
                        ->where('gestiones.id_gestion',$id_gestion)
                        ->select('clubs.id_club')
                        ->get()->toArray();        

        $lista = array();
                        foreach ($inscritos as $inscrito) {
                            $lista[] = $inscrito->id_club;
                        }
        $clubs = DB::table('clubs')
                        ->whereNotIn('clubs.id_club',$lista)
                        ->select('clubs.*')
                        ->get();
        $gestion = Gestion::find($id_gestion);

        return view('admin.gestion_clubs')->with('clubs_inscritos',$clubs_inscritos)->with('clubs',$clubs)->with('gestion',$gestion);
    }
    public function disciplinas($id_gestion){
        $disciplinas = DB::table('disciplinas')
                    ->join('participaciones','disciplinas.id_disc','=','participaciones.id_disciplina')
                    ->where('participaciones.id_gestion',$id_gestion)
                    ->get();
        //$disciplinas = Disciplina::all();
        $gestion = Gestion::find($id_gestion);
        //return dd($disciplinas);
        
        $inscritos = DB::table('disciplinas')
                    ->join('participaciones','disciplinas.id_disc','=','participaciones.id_disciplina')
                    ->where('participaciones.id_gestion',$id_gestion)
                    ->select('disciplinas.id_disc')
                        ->get()->toArray();
        $lista = array();
                        foreach ($inscritos as $inscrito) {
                            $lista[] = $inscrito->id_disc;
                        }
        $disciplinasDisponibles = DB::table('disciplinas')
                        ->whereNotIn('disciplinas.id_disc',$lista)
                        ->select('disciplinas.*')
                        ->get();
        return view('admin.gestion_disciplina')->with('disciplinas',$disciplinas)->with('gestion',$gestion)->with('disciplinasDisponibles',$disciplinasDisponibles);
    }
    public function agregar_disciplinas(Request $request){
        //return dd($request);
        $id_gestion = $request->get('id_gestion');
        $disciplinas = $request->get('id_disc');
        
        foreach ($disciplinas as $disc) {
            $datos = new participacion;
            $datos->id_gestion = $id_gestion;
            $datos->id_disciplina = $disc;
            $datos->save();
        }
        
        return redirect()->back();
    }
     function eliminar_disciplina($id_gestion,$id_disciplina){
        $id_participacion = Participacion::where('id_gestion','=',$id_gestion)
                    ->where('id_disciplina','=',$id_disciplina)
                    ->delete();
        //return dd($id_participacion);
        return redirect()->back();
     }
}
