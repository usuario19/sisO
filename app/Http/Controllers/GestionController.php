<?php
namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Fase;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Ganador;
use App\Models\Participante_Ganador;
use App\Models\Participacion;
use App\Models\Tabla_Posicion;
use App\Models\Tabla_Posicion_Jugador;
use App\Models\Club_Participacion;
use Illuminate\Http\Request;
use App\Http\Requests\GestionRequest;
use App\Http\Requests\UpdateGestionRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Admin_Club;
use App\Models\Jugador_Club;
use App\Models\Reconocimiento;

class GestionController extends Controller
{
    public function index(){
        $gestiones = DB::table('gestiones')->get();
        $disciplinas = Disciplina::all();
        //$disciplinas = DB::table('disciplinas')->get();
        return view('admin.listar_gestion')->with('gestiones', $gestiones)->with('disciplinas', $disciplinas);
    }
    public function create(){
        $disciplina = DB::table('disciplinas')->get();
        $disciplinas2 = DB::table('disciplinas')
            ->get()->toArray();
        $disciplinas = array();
        foreach ($disciplinas2 as $disciplina) {
            $categoria = "";
            switch ($disciplina->categoria) {
                case '0':
                    $categoria = "mixto";
                    break;
                case '1':
                    $categoria = "damas";
                    break;
                case '2':
                    $categoria = "varones";
                    break;
            }
            $disciplinas[$disciplina->id_disc] = $disciplina->nombre_disc . " " . $categoria;
        }
        //return dd($disciplinas);
        return view('admin.reg_gest')->with('disciplinas', $disciplinas);
    }
    public function store(GestionRequest $request)
    {
        $gestion = new Gestion;
        $gestion->nombre_gestion = $request->get('nombre_gestion');
        $gestion->fecha_ini = $request->get('fecha_inicio');
        $gestion->fecha_fin = $request->get('fecha_fin');
        $gestion->desc_gest = $request->get('descripcion');
        $gestion->sede = $request->get('sede');
        $gestion->estado_gestion = 1;
        $gestion->periodo_inscripcion= 1;
        $gestion->save();

        $ultima_gestion = Gestion::all();
        $valor = $ultima_gestion->last()->id_gestion;

        $disciplinas = $request->get('disciplinas');
        foreach ($disciplinas as $disc) {
            $datos = new participacion;
            $datos->id_gestion = $valor;
            $datos->id_disciplina = $disc;
            $datos->save();
        }
        return redirect()->route('gestion.index');
    }

    public function show($id)
    {
        $gestiones = Gestion::all();
        $gestion = Gestion::find($id);
        return view('plantillas.menus.menu_gestion')->with('gestion', $gestion)->with('gestiones', $gestiones);
    }

    public function mostrarGestion()
    {
        $gestiones = DB::table('gestiones')->get();
        $disciplinas = DB::table('disciplinas')->get();

        return view('admin.listar_gestion')->with('gestiones', $gestiones)->with('disciplinas', $disciplinas);
    }
    public function mostrarGestion_principal()
    {
        $gestiones = DB::table('gestiones')->get();
        $disciplinas = DB::table('disciplinas')->get();

        return view('principal.listar_gestion')->with('gestiones', $gestiones)->with('disciplinas', $disciplinas);
    }
    public function configurar($id_gestion)
    {
        $gestiones2 = Gestion::select('nombre_gestion')->get();
        $gestiones = array();
        foreach ($gestiones2 as $gestion) {
            $gestiones[] = $gestion->nombre_gestion;
        }
        $gestion = Gestion::find($id_gestion);
        $disciplinasInscrito = DB::table('gestiones')
            ->join('participaciones', 'gestiones.id_gestion', '=', 'participaciones.id_gestion')
            ->join('disciplinas', 'participaciones.id_disciplina', '=', 'disciplinas.id_disc')
            ->where('gestiones.id_gestion', '=', $id_gestion)
            ->get();
        $disciplinas = array();
        foreach ($disciplinasInscrito as $disciplina) {
            $disciplinas[] = $disciplina->id_disc;
        }
        $disciplinasNoInscrito = DB::table('Disciplinas')
            ->whereNotIn('disciplinas.id_disc', $disciplinas)
            ->get();
        //$disciplinas = Disciplina::get();
        //return dd($disciplinasInscrito );
        return view('gestiones.configurar_gestion')->with('gestion', $gestion)->with('disciplinasInscrito', $disciplinasInscrito)->with('disciplinasNoInscrito', $disciplinasNoInscrito)->with('gestiones', $gestiones);
    }

    public function edit($id){

    }

    public function update(UpdateGestionRequest $request)
    {   //return dd($request);
        $id_gestion = $request->get('id_gestion');
        DB::table('gestiones')
            ->where('id_gestion', $id_gestion)
            ->update(['nombre_gestion' => $request->get('nombre_gestion'),
                'fecha_ini' => $request->get('fecha_ini'),
                'fecha_fin' => $request->get('fecha_fin'),
                'desc_gest' => $request->get('descripcion'),
                'sede' => $request->get('sede'),
                'estado_gestion' => $request->get('estado_gestion'),
                'periodo_inscripcion' => $request->get('periodo_inscripcion')
            ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        //return 'eliminado';
        DB::table('gestiones')->where('id_gestion', '=',$id)->delete();
        return redirect()->route('gestion.index');
    }
    public function destroy_rec($id)
    {
        //return 'eliminado';
        DB::table('reconocimientos')->where('id_reconocimiento', '=',$id)->delete();
        return redirect()->back();
    }

    public function clubs($id_gestion)
    {
        //clubs inscritos en una determinada gestion
        $clubs_inscritos = DB::table('clubs')
            ->join('adminClubs', 'clubs.id_club', '=', 'adminClubs.id_club')
            ->join('inscripciones', 'adminClubs.id_adminClub', '=', 'inscripciones.id_adminClub')
            ->join('gestiones', 'inscripciones.id_gestion', '=', 'gestiones.id_gestion')
            ->where('gestiones.id_gestion', $id_gestion)
            ->select('clubs.*', 'gestiones.nombre_gestion')
            ->get();
        $inscritos = DB::table('clubs')
            ->join('adminClubs', 'clubs.id_club', '=', 'adminClubs.id_club')
            ->join('inscripciones', 'adminClubs.id_adminClub', '=', 'inscripciones.id_adminClub')
            ->join('gestiones', 'inscripciones.id_gestion', '=', 'gestiones.id_gestion')
            ->where('gestiones.id_gestion', $id_gestion)
            ->select('clubs.id_club')
            ->get()->toArray();

        $lista = array();
        foreach ($inscritos as $inscrito) {
            $lista[] = $inscrito->id_club;
        }
        $clubs = DB::table('clubs')
            ->whereNotIn('clubs.id_club', $lista)
            ->select('clubs.*')
            ->get();
        $gestion = Gestion::find($id_gestion);

        return view('admin.gestion_clubs')->with('clubs_inscritos', $clubs_inscritos)->with('clubs', $clubs)->with('gestion', $gestion);
    }
    public function disciplinas($id_gestion){
        $disciplinas = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->get();
        //$disciplinas = Disciplina::all();
        $gestion = Gestion::find($id_gestion);
        //return dd($disciplinas);

        $inscritos = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->select('disciplinas.id_disc')
            ->get()->toArray();
        $lista = array();
        foreach ($inscritos as $inscrito) {
            $lista[] = $inscrito->id_disc;
        }
        $disciplinasDisponibles = Disciplina::whereNotIn('id_disc', $lista)->get();
        $inscripciones=Inscripcion::where('id_gestion',$id_gestion)->get();
        return view('admin.gestion_disciplina')->with('disciplinas', $disciplinas)->with('gestion', $gestion)->with('disciplinasDisponibles', $disciplinasDisponibles)->with('inscritos', $inscripciones);
    }
    public function inscripcion_club_disciplina(Request $request){
        
        $this->validate($request, [
            'id_clubs' => 'required',
            'id_gest' => 'required',
            'id_disc' => 'required',
        ],[
            'id_clubs.required'=>'Debe seleccionar por lo menos un club.'
        ]); 
        $id_gestion = $request->id_gest;
        $id_disc = $request->id_disc;

        foreach ($request->id_clubs as $id_club) {
            $datos = new Club_Participacion;
            $datos->id_gestion = $id_gestion;
            $datos->id_disc = $id_disc;
            $datos->id_club = $id_club;
            $datos->save();
        }
        return redirect()->back();

    }
    public function eliminar_club_disciplina(Request $request)
    {
        $this->validate($request, [
            'id_club_parts' => 'required',
        ],[
            'id_club_parts.required'=>'Debe seleccionar por lo menos un club.'
        ]);

        foreach ($request->id_club_parts as $id_club_part) {
            Club_Participacion::where('id_club_part',$id_club_part)
                                ->delete();
        }
        return redirect()->back();
    }
    public function vista_inscripcion_club_disc( $id_gestion ,$id_disc){
        /* $disciplinas = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->get(); */
        $disciplina = Disciplina::find($id_disc);
        $gestion = Gestion::find($id_gestion);
        $inscritos = Club_Participacion::where('id_gestion',$id_gestion)->where('id_disc',$id_disc)->get();
        $lista = [];
        foreach ($inscritos as $inscrito) {
            $adminClub = Admin_Club::where('id_club',$inscrito->id_club)->get();
            $lista[] = $adminClub->first()->id_adminClub;
        }
        $inscripciones = Inscripcion::where('id_gestion',$id_gestion)->whereNotIn('id_adminClub', $lista)->get();

        return view('admin.gestion_inscripcion_club_disciplina',compact('disciplina', 'gestion', 'inscripciones','inscritos'));
    }
    public function agregar_disciplinas(Request $request)
    {
        $this->validate($request, [
            'id_disc' => 'required'
        ],[
            'id_disc.required'=>'Debe seleccionar por lo menos una disciplina.'
        ]); 

        

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
    public function agregar_clubs_inscripcion(Request $request)
    {
        $this->validate($request, [
            'id_club' => 'required'
        ],[
            'id_disc.required'=>'Debe seleccionar por lo menos un club.']);

        if($request->isMethod('post')){
            $id_gestion = $request->get('id_gestion');
            $clubs = $request->get('id_club');
            foreach ($clubs as $club) {
            $id_adminClub = DB::table('adminClubs')
                ->where('adminClubs.id_club', $club)
                ->where('adminClubs.estado_coordinador', 1)
                ->select('adminClubs.id_adminClub')
                ->get()->last();
            $datos = new Inscripcion;
            $datos->id_gestion = $id_gestion;
            $datos->id_adminClub = $id_adminClub->id_adminClub;
            $datos->save();
            }
            //return dd($request);
            return redirect()->back();
        }
        else return dd('algo');
        
    }
    public function eliminar_disciplina($id_gestion, $id_disciplina)
    {
        $id_participacion = Participacion::where('id_gestion', '=', $id_gestion)
            ->where('id_disciplina', '=', $id_disciplina)
            ->delete();
        //return dd($id_participacion);
        return redirect()->back();
    }
    public function listar_clubs($id_gestion)
    {
        //clubs inscritos en una determinada gestion
        $clubs_inscritos = DB::table('clubs')
            ->join('adminClubs', 'clubs.id_club', '=', 'adminClubs.id_club')
            ->join('inscripciones', 'adminClubs.id_adminClub', '=', 'inscripciones.id_adminClub')
            ->join('gestiones', 'inscripciones.id_gestion', '=', 'gestiones.id_gestion')
            ->where('gestiones.id_gestion', $id_gestion)
            ->select('clubs.*', 'gestiones.nombre_gestion')
            ->get();

        $gestion = Gestion::find($id_gestion);

        return view('gestiones.listar_clubs_inscritos')->with('clubs_inscritos', $clubs_inscritos)->with('gestion', $gestion);
    }
    public function clasificacion($id_gestion)
    {
        $disciplinas2 = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->get()->toArray();
        //$disciplinas = array_pluck($disciplinas2, 'disciplinas2.nombre_disc');
        $disciplinas3 = array();
        foreach ($disciplinas2 as $disciplina) {
            $categoria = "";
            switch ($disciplina->categoria) {
                case '0':
                    $categoria = "mixto";
                    break;
                case '1':
                    $categoria = "damas";
                    break;
                case '2':
                    $categoria = "varones";
                    break;
            }
            $disciplinas3[$disciplina->id_disc] = $disciplina->nombre_disc . " " . $categoria;
        }
        //return dd($disciplinas);
        $gestion = Gestion::find($id_gestion);

        $inscritos = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->select('disciplinas.id_disc')
            ->get()->toArray();
        $lista = array();
        foreach ($inscritos as $inscrito) {
            $lista[] = $inscrito->id_disc;
        }
        $disciplinasDisponibles = DB::table('disciplinas')
            ->whereNotIn('disciplinas.id_disc', $lista)
            ->select('disciplinas.*')
            ->get();
        $disciplinasIncritas = DB::table('disciplinas')
            ->join('participaciones', 'disciplinas.id_disc', '=', 'participaciones.id_disciplina')
            ->where('participaciones.id_gestion', $id_gestion)
            ->pluck('id_disciplina')->toArray();
        $disciplinas = Disciplina::whereIn('id_disc',$disciplinasIncritas)->get()/* ->paginate(10) */;
        return view('gestiones.clasificacion')->with('disciplinas', $disciplinas)->with('gestion', $gestion)->with('disciplinasDisponibles', $disciplinasDisponibles);
    }
    public function resultados($id_gestion){
        $gestion = Gestion::find($id_gestion);
        //$disciplinasArreglo = Disciplina::pluck('nombre_disc', 'id_disc');
        $disciplinasTodo = Disciplina::get();
        $disciplinas = array();
        foreach($disciplinasTodo as $disciplina){
            $disciplinas[$disciplina->id_disc] = $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria).' - '.$disciplina->nombre_subcateg($disciplina->sub_categoria);
        }
        //return view('gestiones.resultados')->compact('gestion', $gestion)->with('disciplinas', $disciplinas);
        return view('gestiones.resultados',compact('gestion','disciplinas'));
    }
    public function listar_disciplinas_json($id_gestion)
    {
        $disciplinas = Disciplina::all();
        return response()->json($disciplinas);
    }
    public function listar_fases(Request $request, $id_disc)
    {
        if (condition) {
            $fases = Fase::all();
            return response()->json($fases);
        }
    }
    public function mostrar_resultados(request $request){
        $gestion = Gestion::find($request->get('id_gestion'));
        $disciplina = Disciplina::find($request->get('id_disciplina'));
        $id_fase = $request->get('id_fase');
        //dd($id_fase);

        $fase = Fase::find($id_fase);
        if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'series') {
            if ($disciplina->tipo == 0) { //    equipo
                if ($disciplina->es_set($request->get('id_disciplina')) || $disciplina->es_raquetaFronton($request->get('id_disciplina'))== 1) {
                    $tabla_posiciones = DB::table('tabla_posiciones_sets')
                        ->join('club_participaciones','tabla_posiciones_sets.id_club_part','club_participaciones.id_club_part')
                        ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                        ->join('grupos','grupo_club_participaciones.id_grupo','grupos.id_grupo')
                        ->join('fases','grupos.id_fase','fases.id_fase')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->where('tabla_posiciones_sets.id_fase',$id_fase)
                        ->orderBy('nombre_grupo','asc')
                        ->orderBy('puntos','desc')
                        ->orderBy('pj','desc')
                        ->orderBy('ds','desc')
                        ->orderBy('dp','desc')
                        ->get()->groupBy('id_grupo');
                /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                //dd($tabla_posiciones);
                return view('gestiones.tabla_pos_equipo_set',compact('tabla_posiciones','gestion','disciplina','fase'));
                } else {
                    $tabla_posiciones = DB::table('tabla_posicions')
                        ->join('club_participaciones','tabla_posicions.id_club_part','club_participaciones.id_club_part')
                        ->join('grupo_club_participaciones','club_participaciones.id_club_part','grupo_club_participaciones.id_club_part')
                        ->join('grupos','grupo_club_participaciones.id_grupo','grupos.id_grupo')
                        ->join('fases','grupos.id_fase','fases.id_fase')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->where('tabla_posicions.id_fase',$id_fase)
                        ->orderBy('nombre_grupo','asc')
                        ->orderBy('puntos','desc')
                        ->orderBy('pj','desc')
                        ->orderBy('dg','desc')
                        ->orderBy('gf','desc')
                        ->orderBy('gc','desc')
                        ->get()->groupBy('id_grupo');
                /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                //dd($tabla_posiciones);
                return view('gestiones.tabla_pos_equipo',compact('tabla_posiciones','gestion','disciplina','fase'));
                }
                
                
        
            } 
            else {//SERIE COMPETICION
                if ($disciplina->es_raquetaFronton($request->get('id_disciplina'))== 2) {

                $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                    ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                    ->orderBy('nombre_grupo','asc')
                    ->orderBy('tabla_posicion_jugadors.puntos','desc')
                    ->orderBy('tabla_posicion_jugadors.pj','desc')
                    ->orderBy('tabla_posicion_jugadors.ds','desc')
                    ->orderBy('tabla_posicion_jugadors.dp','desc')
                    ->get();

                return view('gestiones.tabla_pos_competicion_set',compact('tabla_posiciones','gestion','disciplina','fase'));
                }else{
                    

                    if($disciplina->es_ajedrez($request->get('id_disciplina'))== 1){
                        $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                        ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('posicion','desc')
                        ->get();
                        return view('gestiones.tabla_pos_competicion_ajedrez',compact('tabla_posiciones','gestion','disciplina','fase'));

                    }else{
                        $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('grupo_seleccions','selecciones.id_seleccion','grupo_seleccions.id_seleccion')
                        ->join('grupos','grupo_seleccions.id_grupo','grupos.id_grupo')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('tiempo_total','asc')
                        ->orderBy('posicion','asc')
                        ->get();
                        return view('gestiones.tabla_pos_competicion',compact('tabla_posiciones','gestion','disciplina','fase'));

                    }

                }
            }
        } else {//ELIMINACION
            if ($disciplina->tipo == 0) { //EQUIPO
                if ($disciplina->es_set($request->get('id_disciplina')) || $disciplina->es_raquetaFronton($request->get('id_disciplina'))== 1) {
                    $tabla_posiciones = DB::table('tabla_posiciones_sets')
                    ->join('club_participaciones','tabla_posiciones_sets.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('fases','tabla_posiciones_sets.id_fase','fases.id_fase')
                    //->join('fechas','fases.id_fase','fechas.id_fase')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('tabla_posiciones_sets.id_fase',$id_fase)
                    ->orderBy('puntos','desc')
                    ->orderBy('pj','desc')
                    ->orderBy('ds','desc')
                    ->orderBy('dp','desc')
                    ->get()->groupBy('id_grupo');
                    /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                    //dd($tabla_posiciones);
                    $fechas = Fase::find($id_fase)->fechas;
                    
                    $encuentros_resultados = DB::table('encuentro_club_participaciones_sets')
                    ->join('encuentros','encuentro_club_participaciones_sets.id_encuentro','encuentros.id_encuentro')
                    ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                    ->join('fases','fechas.id_fase','fases.id_fase')
                    ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentro_club_participaciones_sets.id_fase',$id_fase)
                    ->orderBy('encuentro_club_participaciones_sets.id_encuentro_club_part_set')
                    ->get()->groupBy('id_fecha');
                    return view('gestiones.tabla_pos_equipo_eliminacion_set',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas'));
                }else{//no es set
                    $tabla_posiciones = DB::table('tabla_posicions')
                    ->join('club_participaciones','tabla_posicions.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('fases','tabla_posicions.id_fase','fases.id_fase')
                    //->join('fechas','fases.id_fase','fechas.id_fase')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('tabla_posicions.id_fase',$id_fase)
                    ->orderBy('puntos','desc')
                    ->orderBy('pj','desc')
                    ->orderBy('dg','desc')
                    ->orderBy('gf','desc')
                    ->orderBy('gc','desc')
                            ->get()->groupBy('id_grupo');
                    /* $tabla_posiciones = Tabla_Posicion::where('id_fase','=',$id_fase)->orderBy('puntos','desc')->get(); */
                    //dd($tabla_posiciones);
                    $fechas = Fase::find($id_fase)->fechas;

                    $encuentros_resultados = DB::table('encuentro_club_participaciones')
                    ->join('encuentros','encuentro_club_participaciones.id_encuentro','encuentros.id_encuentro')
                    ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                    ->join('fases','fechas.id_fase','fases.id_fase')
                    ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                    ->join('eliminaciones','club_participaciones.id_club_part','eliminaciones.id_club_part')
                    ->join('clubs','club_participaciones.id_club','clubs.id_club')
                    ->where('encuentro_club_participaciones.id_fase',$id_fase)
                    ->orderBy('encuentro_club_participaciones.id_encuentro_club_part')
                    ->get()->groupBy('id_fecha');
                    return view('gestiones.tabla_pos_equipo_eliminacion',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas'));
                }
            } 
            else {
                if ($disciplina->es_raquetaFronton($request->get('id_disciplina'))== 2) {

                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                        ->orderBy('tabla_posicion_jugadors.puntos','desc')
                        ->orderBy('tabla_posicion_jugadors.pj','desc')
                        ->orderBy('tabla_posicion_jugadors.ds','desc')
                        ->orderBy('tabla_posicion_jugadors.dp','desc')
                        ->get();

                    /* $fechas_e = Fase::find($id_fase)->fechas;
                    $array_fechas=[];

                    foreach ($fechas_e as $fecha) {
                        array_push($array_fechas,$fecha->id_fecha);
                    } */



                    $fechas = Fase::find($id_fase)->fechas;

                    $encuentros_ids= DB::table('encuentros')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->where('fechas.id_fase',$id_fase)
                        ->where('fases.id_fase',$id_fase)
                        ->get();
                    $array=[];

                    foreach ($encuentros_ids as $e) {
                        array_push($array,$e->id_encuentro);
                    }
                    /* dd($array); */

                    $encuentros_resultados = DB::table('encuentro_seleccions')
                        ->join('encuentros','encuentro_seleccions.id_encuentro','encuentros.id_encuentro')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                        ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->whereIn('encuentro_seleccions.id_encuentro',$array)
                        ->orderBy('encuentro_seleccions.id_encuentro_seleccion')
                        ->get()->groupBy('id_fecha');

                return view('gestiones.tabla_pos_competicion_eliminacion_set',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas'));


                }elseif($disciplina->es_ajedrez($request->get('id_disciplina'))== 1) {


                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)
                    ->orderBy('posicion','desc')
                    ->orderBy('cantidad_encuentros','desc')
                    ->get();
                    $fechas = Fase::find($id_fase)->fechas;
                    
                    $encuentros_ids= DB::table('encuentros')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->where('fechas.id_fase',$id_fase)
                        ->where('fases.id_fase',$id_fase)
                        ->get();
                    $array=[];

                    foreach ($encuentros_ids as $e) {
                        array_push($array,$e->id_encuentro);
                    }
                    /* dd($array); */

                    $encuentros_resultados = DB::table('encuentro_seleccions')
                        ->join('encuentros','encuentro_seleccions.id_encuentro','encuentros.id_encuentro')
                        ->join('fechas','encuentros.id_fecha','fechas.id_fecha')
                        ->join('fases','fechas.id_fase','fases.id_fase')
                        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
                        ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                        ->join('clubs','club_participaciones.id_club','clubs.id_club')
                        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                        ->whereIn('encuentro_seleccions.id_encuentro',$array)
                        ->orderBy('encuentro_seleccions.id_encuentro_seleccion')
                        ->get()->groupBy('id_fecha');


                    return view('gestiones.tabla_pos_competicion_eliminacion_ajedrez',compact('tabla_posiciones','encuentros_resultados','gestion','disciplina','fase','fechas'));
                }else {
                    $tabla_posiciones = DB::table('tabla_posicion_jugadors')
                    ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
                    ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                    ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                    ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                    ->where('tabla_posicion_jugadors.id_fase',$id_fase)->get();

                    return view('gestiones.tabla_pos_competicion_eliminacion',compact('tabla_posiciones','gestion','disciplina','fase'));
                }
                

                
    
            }
        }
        
        
        
    }


        
    public function mostrar_resultado_competicion_fase_ajax($id_fase){
        $data = DB::table('tabla_posicion_jugadors')
        ->join('selecciones','tabla_posicion_jugadors.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
        ->where('tabla_posicion_jugadors.id_fase',$id_fase)
        ->get();
        return response()->json($data);
    }
    public function reg_res_competicion_fase(request $request){
        if($request->ajax()){
            $id_fase = $request->fase;
            $id_disc = $request->disc;
            $id_gestion = $request->gestion;
            foreach ($request->tabla as $jugador) {
                $id_seleccion = DB::table('jugador_clubs')
                                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                                ->where('jugador_clubs.id_jugador',$jugador[0])
                                ->where('jugador_clubs.id_club',$jugador[1])
                                ->where('club_participaciones.id_club',$jugador[1])
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                            ->update(['posicion' => $jugador[2]]);
                // $tabla = DB::table('tabla_posicion_jugadors')
                //     ->where('id_seleccion',$id_seleccion)
                //     ->where('id_fase',$id_fase)->get()->last();
                // //return $tabla;
                // if ($tabla != null) {
                //     $cantidad_encuentros = Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)->get()->last()->cantidad_encuentros;
                //     Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                //             ->update(['cantidad_encuentros' => $cantidad_encuentros+1]);
                // }
                // else{
                //     $tabla_posicion_jugador = new Tabla_Posicion_Jugador();
                //     $tabla_posicion_jugador->id_fase = $id_fase;
                //     $tabla_posicion_jugador->id_disc = $id_disc;
                //     $tabla_posicion_jugador->id_seleccion = $id_seleccion;
                //     $tabla_posicion_jugador->cantidad_encuentros = 1;
                //     $tabla_posicion_jugador->save();
                // }
            }
            
        }
        return $request;
    }
    public function resultados_finales($id_gestion){
        $disciplinas = Participacion::where('id_gestion',$id_gestion)->get();
        $gestion = Gestion::find($id_gestion);
        return view('gestiones.resultados_finales',compact('disciplinas','gestion'));
    }

    public function reconocimientos($id_gestion){
        $disciplinas = Participacion::where('id_gestion',$id_gestion)->get();
        $gestion = Gestion::find($id_gestion);

        $ps = Participacion::where('id_gestion',$id_gestion);
        $array_p=[];
        foreach($ps as $p){
            array_push($array_p, $p->id_participacion);
        }

        $reconocimientos = Reconocimiento::whereIn('id_participacion',$array_p)->get();
        $club_part = Club_Participacion::where('id_gestion',$id_gestion)->get();
        $gestion = Gestion::find($id_gestion);

        return view('gestiones.reconocimientos',compact('disciplinas','gestion'));
    }
    public function array_clubs_ajax($id_gestion, $id_disc){
        $data = DB::table('club_participaciones')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('club_participaciones.id_disc',$id_disc)
            ->where('club_participaciones.id_gestion',$id_gestion)
            ->get();
        return response()->json($data);
    }
    public function array_jugadores_ajax($id_gestion, $id_disc){
        $data = DB::table('club_participaciones')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('club_participaciones.id_disc',$id_disc)
            ->where('club_participaciones.id_gestion',$id_gestion)
            ->get();
        return response()->json($data);
    }
    public function registrar_ganadores(request $request){
        for ($i=1; $i <= 3; $i++) { 
            $id_participacion = Participacion::where('id_gestion',$request->get('id_gestion'))
                    ->where('id_disciplina',$request->get('id_disc'))
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;
                    $ganadores = new Ganador(); 
                    $ganadores->posicion_ganador = $i;
                    $ganadores->id_participacion = $id_participacion;
                    $ganadores->id_club = $request->get($i);
                    $ganadores->save();
                }
        
        return redirect()->back();
    }
    public function registrar_reconocimientos(request $request){
        
            $id_participacion = Participacion::where('id_gestion',$request->get('id_gestion'))
                    ->where('id_disciplina',$request->get('id_disc'))
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;

                    $ganadores = new Reconocimiento(); 
                    $ganadores->titulo = $request->get('titulo');
                    $ganadores->descripcion = $request->get('descripcion');
                    $ganadores->id_participacion = $id_participacion;
                    $ganadores->id_club = $request->get('1');
                    $ganadores->save();
        
        return redirect()->back();
    }
    public function registrar_reconocimiento_jugador(request $request){
        //
        
            $id_participacion = Participacion::where('id_gestion',$request->get('id_gestion'))
                    ->where('id_disciplina',$request->get('id_disc'))
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;
                    //return dd($request);
                    $ganadores = new Reconocimiento(); 
                    $ganadores->titulo = $request->get('titulo');
                    $ganadores->descripcion = $request->get('descripcion');
                    $ganadores->id_participacion = $id_participacion;
                    //$ganadores->id_jugador = $request->get($i);
                    
                    $jugador_club =Jugador_Club::find($request->get('1'));

                    $ganadores->id_club = $jugador_club->id_club;
                    $ganadores->id_jugador = $jugador_club->id_jugador;
                    $ganadores->save();
        
        return redirect()->back();
    }
    public function registrar_ganadores_competicion(request $request){
        //
        
        for ($i=1; $i <= 3; $i++) { 
            $id_participacion = Participacion::where('id_gestion',$request->get('id_gestion'))
                    ->where('id_disciplina',$request->get('id_disc'))
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;
                    //return dd($request);
                    $ganadores = new Ganador(); 
                    $ganadores->posicion_ganador = $i;
                    $ganadores->id_participacion = $id_participacion;
                    //$ganadores->id_jugador = $request->get($i);
                    
                    $jugador_club =Jugador_Club::find($request->get($i));

                    $ganadores->id_club = $jugador_club->id_club;
                    $ganadores->id_jugador = $jugador_club->id_jugador;
                    $ganadores->save();
                }
        
        return redirect()->back();
    }
    
    public function mostrar_ganadores($id_gestion, $id_disc){

        $data = DB::table('club_participaciones')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('club_participaciones.id_disc',$id_disc)
        ->where('club_participaciones.id_gestion',$id_gestion)
        ->get();
        
        $data_club = DB::table('club_participaciones')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('club_participaciones.id_disc',$id_disc)
            ->where('club_participaciones.id_gestion',$id_gestion)
            ->get();


        $disc = Disciplina::find($id_disc);
        $gestion = Gestion::find($id_gestion);


        $id_part = Participacion::where('id_gestion',$id_gestion)
                    ->where('id_disciplina',$id_disc)
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;
        if ($disc->tipo==0) {
            $ganadores = DB::table('ganadors')
            ->join('clubs','ganadors.id_club','clubs.id_club')
            ->where('ganadors.id_participacion',$id_part)->orderBy('posicion_ganador','asc')->get();
             return view('gestiones.medallero_clubs',compact('gestion','ganadores','data_club'));
        } else {
            $ganadores = DB::table('ganadors')
            ->join('clubs','ganadors.id_club','clubs.id_club')
            ->join('jugadores','ganadors.id_jugador','jugadores.id_jugador')
            ->where('ganadors.id_participacion',$id_part)->orderBy('posicion_ganador','asc')->get();
            /* $ganadores = DB::table('participante_ganadors')
                ->join('jugadores','participante_ganadors.id_jugador','jugadores.id_jugador')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                ->where('participante_ganadors.id_participacion',$id_part)->orderBy('posicion_participante','asc')->get(); */
        return view('gestiones.medallero_jugadores',compact('gestion','ganadores','data'));
        } 
    }

    public function mostrar_reconocimientos($id_gestion, $id_disc){

        $data = DB::table('club_participaciones')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('club_participaciones.id_disc',$id_disc)
        ->where('club_participaciones.id_gestion',$id_gestion)
        ->get();
        
        $data_club = DB::table('club_participaciones')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('club_participaciones.id_disc',$id_disc)
            ->where('club_participaciones.id_gestion',$id_gestion)
            ->get();


        $disc = Disciplina::find($id_disc);
        $gestion = Gestion::find($id_gestion);


        $id_part = Participacion::where('id_gestion',$id_gestion)
                    ->where('id_disciplina',$id_disc)
                    ->select('id_participacion')
                    ->get()->last()->id_participacion;


            $ganadores = DB::table('reconocimientos')
            ->join('clubs','reconocimientos.id_club','clubs.id_club')
            ->where('reconocimientos.id_participacion',$id_part)
            ->where('reconocimientos.id_jugador',null)->get();
             //return view('gestiones.medallero_clubs',compact('gestion','ganadores','data_club'));

            $ganadores2 = DB::table('reconocimientos')
            ->join('clubs','reconocimientos.id_club','clubs.id_club')
            ->join('jugadores','reconocimientos.id_jugador','jugadores.id_jugador')
            ->where('reconocimientos.id_participacion',$id_part)->get();
            /* $ganadores = DB::table('participante_ganadors')
                ->join('jugadores','participante_ganadors.id_jugador','jugadores.id_jugador')
                ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
                ->join('clubs','jugador_clubs.id_club','clubs.id_club')
                ->where('participante_ganadors.id_participacion',$id_part)->orderBy('posicion_participante','asc')->get(); */
        return view('gestiones.medallero_reconocimiento',compact('gestion','ganadores2','ganadores','data','data_club'));
    }

    public function editar_ganador(Request $request/* , $id */)
    {
        $this->validate($request, [
            'id_jug_club' => 'required',
        ],[
            'id_jug_club.required'=>'Debe seleccionar un jugador.'
        ]);
        

        $id = $request->get('id_ganador');
        $id_jug = $request->get('id_jug_club');
        $jug_club=Jugador_Club::find($id_jug);
        
        $datos = Ganador::find($id);

        $datos->id_club = $jug_club->id_club;
        $datos->id_jugador = $jug_club->id_jugador;
        $datos->save();

        flash('Se actualizo correctamente el ganador.')->info()->important();
        return redirect()->back();
    }
    public function editar_rec(Request $request/* , $id */)
    {
        $this->validate($request, [
            'id_jug_club' => 'required',
        ],[
            'id_jug_club.required'=>'Debe seleccionar un jugador.'
        ]);
        

        $id = $request->get('id_reconocimiento');
        $id_jug = $request->get('id_jug_club');
        $jug_club=Jugador_Club::find($id_jug);
        
        $datos = Reconocimiento::find($id);

        $datos->id_club = $jug_club->id_club;
        $datos->id_jugador = $jug_club->id_jugador;
        $datos->save();

        flash('Se actualizo correctamente.')->info()->important();
        return redirect()->back();
    }
    public function editar_ganador_club(Request $request/* , $id */)
    {
        $this->validate($request, [
            'id_club' => 'required',
        ],[
            'id_club.required'=>'Debe seleccionar un club.'
        ]);
        

        $id = $request->get('id_ganador');
        //$id_jug = $request->get('id_jug_club');
        //$jug_club=Jugador_Club::find($id_jug);
        
        $datos = Ganador::find($id);

        $datos->id_club = $request->get('id_club') ;
        //$datos->id_jugador = $jug_club->id_jugador;
        $datos->save();

        flash('Se actualizo correctamente el ganador.')->info()->important();
        return redirect()->back();
    }
    public function editar_rec_club(Request $request/* , $id */)
    {
        $this->validate($request, [
            'id_club' => 'required',
        ],[
            'id_club.required'=>'Debe seleccionar un club.'
        ]);
        

        $id = $request->get('id_reconocimiento');
        //$id_jug = $request->get('id_jug_club');
        //$jug_club=Jugador_Club::find($id_jug);
        
        $datos = Reconocimiento::find($id);

        $datos->id_club = $request->get('id_club') ;
        //$datos->id_jugador = $jug_club->id_jugador;
        $datos->save();

        flash('Se actualizo correctamente.')->info()->important();
        return redirect()->back();
    }

}
