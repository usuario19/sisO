<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Gestion;
use App\Models\Tipo;
use App\Models\Club_Participacion;
use App\Models\Jugador_Club;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use Softon\SweetAlert\Facades\SWAL; 

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = DB::table('disciplinas')->get();
        SWAL::message('Good Job','You have successfully logged In!','info');  
        return view('disciplina.listar_disciplina')->with('disciplinas',$disciplinas);
    }

    public function create()
    {
        //
        return view('disciplina.reg_disc');
    }

    public function store(Request $request){
        $datos = new Disciplina($request->all());
        $datos->save();
        return redirect()->route('disciplina.index');
    }

    public function show($id)
    {
        //para listar disciplina

    }
    public function mostrarDisc()
    {
        //
        $disciplinas = DB::table('disciplinas')->get();
        return view('disciplina.listar_disciplina')->with('disciplinas',$disciplinas);

    }

    public function edit($id_disc)
    {
        /**$datos = DB::table('disciplinas')
        ->where('id_disc',$id)
        ->get();

        foreach ($datos as $dato) {
            $disciplina = $dato;
        }
        return view('disciplina.editar_disc')->with('disciplina',$disciplina);*/

        $disciplina = Disciplina::find($id_disc);
    
        return response()->json($disciplina);
    }

    public function update(Request $request){
        $id = $request->get('id_disc');
        if($request->hasFile('foto_disc'))
        {   
            $foto_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('foto_disc')
                            ->get()->last();
            $foto_disc = $foto_antiguo->foto_disc;
                if ($foto_disc != 'sin_imagen.png') {
                    Storage::disk('foto_disc')->delete($foto_disc);
                }    
            $foto_nueva = $request->file('foto_disc');

                    $nombre_foto = time().'-'.$foto_nueva->getClientOriginalExtension();
                    Storage::disk('foto_disc')->put($nombre_foto, file_get_contents($foto_nueva));

            if ($request->hasFile('reglamento_disc')) {
                $reglamento_antiguo = DB::table('disciplinas')
                                    ->where('id_disc',$id)
                                    ->select('reglamento_disc')
                                    ->get()->last()->reglamento_disc;
                //foreach ($reglamento_antiguo as $reglamento_disc) {
                        Storage::disk('archivos')->delete($reglamento_antiguo);
                //}    
                $reglamento_nuevo = $request->file('reglamento_disc');
                $nombre_reglamento= time().'-'.$reglamento_nuevo->getClientOriginalExtension();
                Storage::disk('archivos')->put($nombre_reglamento, file_get_contents($reglamento_nuevo));

                
                DB::table('disciplinas')
                    ->where('id_disc', $id)
                    ->update(['nombre_disc' => $request->get('nombre_disc'),
                            'foto_disc'=>$nombre_foto,
                            'categoria'=>$request->get('categoria'),
                            'reglamento_disc'=>$nombre_reglamento,
                            'descripcion_disc'=>$request->get('descripcion_disc')
                        ]); 
            }
            else{
                DB::table('disciplinas')
                    ->where('id_disc', $id)
                    ->update(['nombre_disc' => $request->get('nombre_disc'),
                            'foto_disc'=>$nombre_foto,
                            'categoria'=>$request->get('categoria'),
                            'descripcion_disc'=>$request->get('descripcion_disc')
                        ]);  
            }                  
        }
        else{
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
                            'reglamento_disc'=>$nombre_reglamento,
                            'categoria'=>$request->get('categoria'),
                            'descripcion_disc'=>$request->get('descripcion_disc')
                        ]); 
            }
            else{
                DB::table('disciplinas')
                    ->where('id_disc', $id)
                    ->update(['nombre_disc' => $request->get('nombre_disc'),
                            'categoria'=>$request->get('categoria'),
                            'descripcion_disc'=>$request->get('descripcion_disc')
                        ]);  
            }     
        }
        return redirect()->route('disciplina.index');
    }

    public function destroy($id)
    {
         
        $foto_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('foto_disc')
                            ->get();
            foreach ($foto_antiguo as $foto_disc) {
        if ($foto_disc->foto_disc != 'sin_imagen.png') {
            Storage::disk('foto_disc')->delete($foto_disc->foto_disc);     
                }
                   
        }

        $reglamento_antiguo = DB::table('disciplinas')
                            ->where('id_disc',$id)
                            ->select('reglamento_disc')
                            ->get();
            foreach ($reglamento_antiguo as $reglamento_disc) {
                Storage::disk('archivos')->delete($reglamento_disc->reglamento_disc);    
        }
        DB::table('disciplinas')->where('id_disc', '=',$id)->delete();

        //swal.clickConfirm();
        SWAL::message('Good Job','You have successfully logged In!','info');
        //return redirect()->route('disciplina.index'); 
    }
   


    //Almacenar las disciplinas donde participa cada club en una gestion especifica
    public function store_disc_club(Request $request)
    {
        $this->validate($request, [
                        'id_disciplinas' => 'required'
                    ],[
                        'id_disciplinas.required'=>'Seleccione una disciplina.']); 
        
        $id_club = $request->id_club;
        $id_gestion = $request->id_gestion;

        $disciplinas =$request->get('id_disciplinas');
        foreach ($disciplinas as $disc) {
            if(Club_Participacion::where('id_club',$id_club)->where('id_gestion',$id_gestion)->where('id_disc',$disc)->doesntExist())
            {
                $datos = new Club_Participacion;
                $datos->id_disc=$disc;
                $datos->id_club=$id_club;
                $datos->id_gestion=$id_gestion;
                $datos->save();
            }else{
                echo'ya esta inscrito.';
            }

            
        }
        flash('Se añadieron las disciplinas correctamente. ')->success()->important();
        return back()->withInput();
        //return redirect()->route('disciplina.ver_disciplinas',[$id_club,$id_gestion]);
    }
    /*
    public function update_disc_club(Request $request, $id)
    {
        ///*
        $id_club = $request->id_club;
        $disciplinas =$request->get('id_disciplinas');
        foreach ($disciplinas as $disc) {
            $datos = new Club_Participacion;
            $datos->id_participacion=$disc;
            $datos->id_club=$id_club;

            $datos->save();
        }
        return redirect()->route('coordinador.mis_gestiones');
        //*//*
       //dd('holfsdf');
    }*/
    
    public function ver_disciplinas_jugadores($id_club,$id_gestion)
    {
        $jugadores = Jugador_Club::where('id_club',$id_club)->get();

        $disciplinas = Club_Participacion::where('id_gestion',$id_gestion)->where('id_club', $id_club)->get();

        /*$datos = DB::table('clubs')
        ->join('club_participaciones','club_participaciones.id_club','clubs.id_club')
        ->join('gestiones','gestiones.id_gestion','club_participaciones.id_gestion')
        ->select('clubs.nombre_club','clubs.logo','gestiones.nombre_gestion')
        ->where('clubs.id_club',$id_club)
        ->where('gestiones.id_gestion',$id_gestion)
        ->distinct()->get();*/

        $datos = DB::table('gestiones')
        ->join('inscripciones','inscripciones.id_gestion','gestiones.id_gestion')
        ->join('adminClubs','adminClubs.id_adminClub','inscripciones.id_adminClub')
        ->join('clubs','clubs.id_club','adminClubs.id_club')
        ->select('clubs.nombre_club','clubs.logo','clubs.id_club','gestiones.nombre_gestion','gestiones.id_gestion','inscripciones.id_inscripcion')
        ->where('clubs.id_club',$id_club)
        ->where('gestiones.id_gestion',$id_gestion)
        ->distinct()->get();


        //return view('coordinador.ver_disciplinas')->with('disciplinas',$disciplinas)->with('datos',$datos);
        return view('coordinador.ver_disciplinas_jugadores')->with('club_jugadores',$jugadores)->with('datos',$datos);
    }

    public function ver_disciplinas($id_club,$id_gestion)
    {

        $disciplinas = Club_Participacion::where('id_gestion',$id_gestion)->where('id_club', $id_club)->get();

        /*$datos = DB::table('clubs')
        ->join('club_participaciones','club_participaciones.id_club','clubs.id_club')
        ->join('gestiones','gestiones.id_gestion','club_participaciones.id_gestion')
        ->select('clubs.nombre_club','clubs.logo','gestiones.nombre_gestion')
        ->where('clubs.id_club',$id_club)
        ->where('gestiones.id_gestion',$id_gestion)
        ->distinct()->get();*/

        $datos = DB::table('gestiones')
        ->join('inscripciones','inscripciones.id_gestion','gestiones.id_gestion')
        ->join('adminClubs','adminClubs.id_adminClub','inscripciones.id_adminClub')
        ->join('clubs','clubs.id_club','adminClubs.id_club')
        ->select('clubs.nombre_club','clubs.logo','clubs.id_club','gestiones.nombre_gestion','gestiones.id_gestion','inscripciones.id_inscripcion')
        ->where('clubs.id_club',$id_club)
        ->where('gestiones.id_gestion',$id_gestion)
        ->distinct()->get();


        return view('coordinador.ver_disciplinas')->with('disciplinas',$disciplinas)->with('datos',$datos);
        //return view('coordinador.ver_disciplinas_jugadores')->with('club_jugadores',$jugadores)->with('datos',$datos);
    }



    public function eliminar($id_club_part)
    {
        //
        $participacion= Club_Participacion::find($id_club_part);
        $id = $participacion->id_club;
        $participacion->delete();

        flash('Se elimino la participacion en la disciplinaa. ')->info()->important();
        return back()->withInput(['id_club'=>$id]);

    }


    public function fases($id_gestion,$id_disc){
        //$fases = Fase::where('id_disciplina','=',$id_disc)->where('id')
        /*$fases = DB::table('fases')
                ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')

                ->where('participaciones.id_disciplina',$id_disc)
                ->get();*/
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fases = DB::table('participaciones')
                ->join('fases','participaciones.id_participacion','=','fases.id_participacion')
                ->join('fase_tipos','fases.id_fase','=','fase_tipos.id_fase')
                ->join('tipos','fase_tipos.id_tipo','=','tipos.id_tipo')
                ->where('participaciones.id_gestion','=',$id_gestion)
                ->where('participaciones.id_disciplina','=',$id_disc)
                ->select('fases.*','tipos.*')
                ->get();
        $tipos2 = Tipo::get();
        return view('fases.list_fase')->with('fases',$fases)->with('id_gestion',$id_gestion)->with('id_disc',$id_disc)->with('tipos2',$tipos2)->with('gestion',$gestion)->with('disciplina',$disciplina);

    }
}
