<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Admin_club;
use App\Models\Administrador;
use App\Models\Gestion;
use App\Models\Inscripcion;
use App\Models\Encuentro;
use App\Models\Eliminacion;
use App\Models\Fecha;
use App\Models\Jugador;
use App\Models\Grupo;
use App\Models\Fase;
use App\Models\Encuentro_Club_Participacion;
use App\Models\Encuentro_Club_Participaciones_Set;
use App\Models\Encuentro_Seleccion;
use App\Models\Tabla_Posicion;
use App\Models\Tabla_Posicion_Jugador;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use PDF;
use App\Models\Disciplina;
use App\Models\Club_Participacion;
use App\Models\Tabla_Posiciones_Set;

class EncuentroController extends Controller
{
	public function __construct()
	{
	}
    public function index()
    {  
    }
    public function create()
    {   
    }
    public function store(Request $request){
        $this->validate($request, [
            'id_club1' => 'required',
            'id_club2' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'id_fecha' => 'required',
            'id_centro' => 'required',
        ]);
        
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');
        $disc = Disciplina::find($id_disc);

        $encuentro = new Encuentro($request->all());
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        
        for ($i=1; $i <= 2; $i++) { 
            $id_club_part = DB::table('club_participaciones')
            ->where('id_gestion','=',$id_gestion)
            ->where('id_disc','=',$id_disc)
            ->where('id_club','=',$request->get('id_club'.$i))
            ->select('id_club_part')
            ->get()->last()->id_club_part;
        
            if($disc->es_set($id_disc) == 1 || $disc->es_raquetaFronton($id_disc) == 1 )
            { //set equipo
                $encuentro_club_part = new Encuentro_Club_Participaciones_Set();
                $encuentro_club_part->id_encuentro = $id_encuentro;
                $encuentro_club_part->id_club_part = $id_club_part;
                $encuentro_club_part->id_fase = $id_fase;
                $encuentro_club_part->save();
            }else{
                $encuentro_club_part = new Encuentro_Club_Participacion();
                $encuentro_club_part->id_encuentro = $id_encuentro;
                $encuentro_club_part->id_club_part = $id_club_part;
                $encuentro_club_part->id_fase = $id_fase;
                $encuentro_club_part->save();
            }
            
        }        
        return redirect()->back();
    }
    public function store_competicion_serie(Request $request){
        $this->validate($request, [
            'fecha' => 'required',
            'hora' => 'required',
            'id_fecha' => 'required',
            'id_centro' => 'required',
            'id_participante' => 'required',
        ]);

        $encuentro = new Encuentro($request->all());
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');
        
        
        $participantes = $request->get('id_participante');
        foreach($participantes as $participante) { 
            /* $id_seleccion = DB::table('selecciones')
                ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                ->where('club_participaciones.id_gestion',$id_gestion)
                ->where('club_participaciones.id_disc',$id_disc)
                ->where('club_participaciones.id_club',$id_club)
                ->where('jugadores.id_jugador','=',$participante)
                ->select('selecciones.*')->get()->last()->id_seleccion; */
                  
            $id_seleccion = $participante;
            $encuentro_seleccions = new Encuentro_Seleccion();
            $encuentro_seleccions->id_encuentro = $id_encuentro;
            $encuentro_seleccions->id_seleccion = $id_seleccion;
            $encuentro_seleccions->save();
        }
        return redirect()->back();
    }
    public function store_competicion_serie_set(Request $request){
        $this->validate($request, [
            'fecha' => 'required',
            'hora' => 'required',
            'id_fecha' => 'required',
            'id_centro' => 'required',
            'jugador1' => 'required',
            'jugador2' => 'required',
        ]);
        $encuentro = new Encuentro($request->all());
        $encuentro->save();

        $id_encuentro = $encuentro->id_encuentro;
        $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');

        $jugador1 = $request->get('jugador1');
        $jugador2 = $request->get('jugador2');
        
        
       /*  $participantes = $request->get('id_participante');
        foreach($participantes as $participante) { 
            $id_seleccion = $participante; */
            $encuentro_seleccions1 = new Encuentro_Seleccion();
            $encuentro_seleccions1->id_encuentro = $id_encuentro;
            $encuentro_seleccions1->id_seleccion = $jugador1;
            $encuentro_seleccions1->save();

            $encuentro_seleccions2 = new Encuentro_Seleccion();
            $encuentro_seleccions2->id_encuentro = $id_encuentro;
            $encuentro_seleccions2->id_seleccion = $jugador2;
            $encuentro_seleccions2->save();
       /*  } */
        return redirect()->back();
    }
    public function destroy($id_encuentro){
        DB::table('encuentros')->where('id_encuentro', '=',$id_encuentro)->delete();
        return redirect()->back();            
    }
    public function es_fase_series($id_encuentro,$id_fase){
        $encuentro = Encuentro::find($id_encuentro);
        //$id_fase = $encuentro->Fecha->fase->fase_tipos->first()->tipos->nombre_tipo;
        $id = $encuentro->Fecha->fase->id_fase;

        return ($id == $id_fase);
    }
    //futbol
    public function reg_resultado(request $request)
    {
        //dd($request);
       /*  $id_encuentro = $request->get('id_encuentro1'); */

        $t_extra = $request->get('hab_te');
        $goles_p = $request->get('hab_p');

       /*  dd($t_extra); */

        $id_enc = $request->get('id_enc');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');

        $fase = Fase::find($id_fase);
        $fase_tipo = $fase->fase_tipos->first()->tipos->nombre_tipo;

       /*  $id_club1 = $request->get('id_club1'); */
        /* $id_club_part1 = Club_Participacion::where('id_club',$id_club1)
                                                ->where('id_disc',$id_disc)
                                                ->where('id_gestion',$id_gestion)
                                                ->get()->last()->id_club_part;

        $id_club2 = $request->get('id_club2');
        $id_club_part2 = Club_Participacion::where('id_club',$id_club2)
                                                ->where('id_disc',$id_disc)
                                                ->where('id_gestion',$id_gestion)
                                                ->get()->last()->id_club_part; */
        //REGISTRAR  EN ENCUENTRO CLUB PARTICIPACIONES
        $disc = Disciplina::find($request->get('id_disc'));

        for ($i=1; $i <= 2; $i++) {
            $puntos = $request->get('punto'.$i);
            $observacion = $request->get('observacion'.$i);
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);

            if ($disc->es_futbol($disc->id_disc)) {
                $goles = $request->get('goles'.$i);
                    if ($fase_tipo == 'eliminacion') {
                        $puntos_extras = $request->get('puntos_extras'.$i);
                        $penales = $request->get('penales'.$i);
                        if($t_extra == null)
                            $puntos_extras = NULL;
                        if($goles_p == null)
                            $penales = NULL;
                        

                        Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                        ->update(['puntos' => $puntos, 'goles'=>$goles, 'puntos_extras'=>$puntos_extras, 'penales'=>$penales,'observacion'=>$observacion]);
                    }else{
                        Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                        ->update(['puntos' => $puntos, 'goles'=>$goles,'observacion'=>$observacion]);
                    }
            } else {
                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion]);
            }
                                                
        }                                   
        //ACUTALIZAR_TABLA DE POSICIONES
        //CLUB1
        //1.obtener sus participaciones

        for ($i=1; $i <= 2; $i++) 
        {
            $id_club = $request->get('id_club'.$i);
            $id_club_part1= Club_Participacion::where('id_club',$id_club)
                                                ->where('id_disc',$id_disc)
                                                ->where('id_gestion',$id_gestion)
                                                ->get()->last()->id_club_part;
            /* dd($id_club_part1); */
            $goles_favor=0;
            $goles_contra=0;
            $pj=0;
            $pg=0;
            $pe=0;
            $pp=0;
            $puntos_total=0;
            $id_encuentros=[];

            $participaciones = Encuentro_Club_Participacion::where('id_club_part',$id_club_part1)
                                                            ->where('id_fase',$id_fase)
                                                            ->where('goles','!=',NULL)
                                                            ->where('puntos','!=',NULL)->get();
            
            if ($fase_tipo == 'eliminacion') {
                foreach ($participaciones as $participacion) {
                    # obtener la suma de puntos y goles para futbol
                    /* if ($t_extra !== null) */
                        $goles_favor += $participacion->puntos_extras;
                        
                   /*  if($goles_p !== null) */
                        $goles_favor += $participacion->penales;


                        $goles_favor += $participacion->goles;
                        $puntos_total += $participacion->puntos;
                        $pj+=1;
                        array_push($id_encuentros, $participacion->id_encuentro);
                }

                $encuentros_club = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)
                ->where('goles','!=',NULL)
                ->where('puntos','!=',NULL)
                ->orderBy('id_encuentro')->get();

                foreach ($encuentros_club as $encuentro) {
                    if ($encuentro->id_club_part != $id_club_part1) {
                        /* if ($t_extra !== null) */
                            $goles_contra += $encuentro->puntos_extras;
                        
                        /* if($goles_p !== null) */
                            $goles_contra += $encuentro->penales;

                        $goles_contra += $encuentro->goles;
                    }
                }
                
                foreach ($encuentros_club->groupBy('id_encuentro') as $encuentro) {
                    /* echo($id_club_part1);
                    echo($encuentro->first()->id_club_part); */
    
                    if ($encuentro->first()->id_club_part == $id_club_part1) {
                        /* echo($encuentro->first()->goles);
                        echo($encuentro->last()->goles); */


                        if($encuentro->first()->goles > $encuentro->last()->goles)
                        {
                            $pg+=1;
                        }elseif($encuentro->first()->goles < $encuentro->last()->goles)
                        {
                                $pp+=1;
                        }else{//solo si empatan
                            if ($encuentro->first()->penales !== null ){ //hay penales
                                if($encuentro->first()->penales > $encuentro->last()->penales)
                                {
                                    $pg+=1;
                                }elseif($encuentro->first()->penales < $encuentro->last()->penales)
                                {
                                    $pp+=1;
                                }
                            }elseif($encuentro->first()->puntos_extras !== null && $encuentro->first()->penales == null){//si hay tiempo extra
                                if($encuentro->first()->puntos_extras > $encuentro->last()->puntos_extras)
                                {
                                    $pg+=1;
                                }elseif($encuentro->first()->puntos_extras < $encuentro->last()->puntos_extras)
                                {
                                    $pp+=1;
                                }
                            }/* elseif($t_extra == null && $goles_p != null){
                                if($encuentro->first()->penales > $encuentro->last()->penales)
                                {
                                    $pg+=1;
                                }elseif($encuentro->first()->penales < $encuentro->last()->penales)
                                {
                                    $pp+=1;
                                }
                            } */
                            else{
                                $pe+=1;
                            }
                        }
                    }else{
                        if($encuentro->last()->goles > $encuentro->first()->goles)
                        {
                            $pg+=1;
                        }elseif($encuentro->last()->goles < $encuentro->first()->goles)
                        {
                            $pp+=1;
                        }else{
                            if ($encuentro->first()->penales !== null ){ //hay penales
                                if($encuentro->last()->penales > $encuentro->first()->penales)
                                {
                                    $pg+=1;
                                }elseif($encuentro->last()->penales < $encuentro->first()->penales)
                                {
                                    $pp+=1;
                                }
                            }elseif($encuentro->first()->puntos_extras !== null && $encuentro->first()->penales == null){//si hay tiempo extra
                                if($encuentro->last()->puntos_extras > $encuentro->first()->puntos_extras)
                                {
                                    $pg+=1;
                                }elseif($encuentro->last()->puntos_extras < $encuentro->first()->puntos_extras)
                                {
                                    $pp+=1;
                                }
                            }/* elseif($t_extra == null && $goles_p != null){
                                if($encuentro->last()->penales > $encuentro->first()->penales)
                                {
                                    $pg+=1;
                                }elseif($encuentro->last()->penales < $encuentro->first()->penales)
                                {
                                    $pp+=1;
                                }
                            } */else{
                                $pe+=1;
                            }
                        }
                    }
                }

            }else{
                foreach ($participaciones as $participacion) {
                    # obtener la suma de puntos y goles para futbol
                        
                        $goles_favor += $participacion->goles;
                        $puntos_total += $participacion->puntos;
                        $pj+=1;
                        array_push($id_encuentros, $participacion->id_encuentro);
                }
                $encuentros_club = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)
                                                                ->where('goles','!=',NULL)
                                                                ->where('puntos','!=',NULL)
                                                                ->orderBy('id_encuentro')->get();

                foreach ($encuentros_club as $encuentro) {
                    if ($encuentro->id_club_part != $id_club_part1) {
                        $goles_contra += $encuentro->goles;
                    }
                }
                
               

                foreach ($encuentros_club->groupBy('id_encuentro') as $encuentro) {
                    /* echo($id_club_part1);
                    echo($encuentro->first()->id_club_part); */
    
                    if ($encuentro->first()->id_club_part == $id_club_part1) {
                        /* echo($encuentro->first()->goles);
                        echo($encuentro->last()->goles); */
                        if($encuentro->first()->goles > $encuentro->last()->goles)
                        {
                            $pg+=1;
                        }elseif($encuentro->first()->goles < $encuentro->last()->goles)
                        {
                                $pp+=1;
                        }else{
                                $pe+=1;
                        }
                    }else{
                        if($encuentro->last()->goles > $encuentro->first()->goles)
                        {
                            $pg+=1;
                        }elseif($encuentro->last()->goles < $encuentro->first()->goles)
                        {
                            $pp+=1;
                        }else{
                            $pe+=1;
                        }
                    }
                }

            }

            Tabla_Posicion::where('id_club_part',$id_club_part1)->where('id_fase',$id_fase)
                        ->update(['puntos' => $puntos_total,
                                  'gf'=>$goles_favor,
                                  'gc'=>$goles_contra,
                                  'dg'=>($goles_favor-$goles_contra),
                                  'pj'=>$pj,
                                  'pg'=>$pg,
                                  'pp'=>$pp,
                                  'pe'=>$pe,
                                  ]);

        }

        return redirect()->back();  
    }
    public function reg_resultado_basket(request $request){
        //dd($request);
       /*  $id_encuentro = $request->get('id_encuentro1'); */

        $t_extra = $request->get('hab_te');
        /* $goles_p = $request->get('hab_p'); */

       /*  dd($t_extra); */

        $id_enc = $request->get('id_enc');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');

        $fase = Fase::find($id_fase);
        $fase_tipo = $fase->fase_tipos->first()->tipos->nombre_tipo;

       
        //REGISTRAR  EN ENCUENTRO CLUB PARTICIPACIONES
        $disc = Disciplina::find($request->get('id_disc'));

        for ($i=1; $i <= 2; $i++) {
            $puntos = $request->get('punto'.$i);
            $observacion = $request->get('observacion'.$i);
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);

            if ($disc->es_basket($disc->id_disc)) {
                $puntos_b = $request->get('puntos_b'.$i);
                    if ($fase_tipo == 'eliminacion') {
                        $puntos_extras = $request->get('puntos_extras'.$i);
                        
                        if($t_extra == null)
                            $puntos_extras = NULL;

                        Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                        ->update(['puntos' => $puntos, 'puntos_b'=>$puntos_b, 'puntos_extras'=>$puntos_extras,'observacion'=>$observacion]);
                    }else{
                        Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                        ->update(['puntos' => $puntos, 'puntos_b'=>$puntos_b,'observacion'=>$observacion]);
                    }
            } 
                                                
        }                                   
        //ACUTALIZAR_TABLA DE POSICIONES
        //CLUB1 y club2
        //1.obtener sus participaciones

        for ($i=1; $i <= 2; $i++) 
        {
            $id_club = $request->get('id_club'.$i);
            $id_club_part1= Club_Participacion::where('id_club',$id_club)
                                                ->where('id_disc',$id_disc)
                                                ->where('id_gestion',$id_gestion)
                                                ->get()->last()->id_club_part;
            /* dd($id_club_part1); */
            $puntos_b_favor=0;
            $puntos_b_contra=0;
            $pj=0;
            $pg=0;
            $pe=0;
            $pp=0;
            $puntos_total=0;
            $id_encuentros=[];

            $participaciones = Encuentro_Club_Participacion::where('id_club_part',$id_club_part1)
                                                            ->where('id_fase',$id_fase)
                                                            ->where('puntos_b','!=',NULL)
                                                            ->where('puntos','!=',NULL)->get();
            
            if ($fase_tipo == 'eliminacion') {
                foreach ($participaciones as $participacion) {

                        $puntos_b_favor += $participacion->puntos_extras;
                        $puntos_b_favor += $participacion->puntos_b;
                        $puntos_total += $participacion->puntos;
                        $pj+=1;
                        array_push($id_encuentros, $participacion->id_encuentro);
                }

                $encuentros_club = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)
                ->where('puntos_b','!=',NULL)
                ->where('puntos','!=',NULL)
                ->orderBy('id_encuentro')->get();

                foreach ($encuentros_club as $encuentro) {
                    if ($encuentro->id_club_part != $id_club_part1) {

                        $puntos_b_contra += $encuentro->puntos_extras;
                        $puntos_b_contra += $encuentro->puntos_b;
                    }
                }
                
                foreach ($encuentros_club->groupBy('id_encuentro') as $encuentro) {
    
                    if ($encuentro->first()->id_club_part == $id_club_part1) {

                        if($encuentro->first()->puntos_b > $encuentro->last()->puntos_b)
                        {
                            $pg+=1;
                        }elseif($encuentro->first()->puntos_b < $encuentro->last()->puntos_b)
                        {
                                $pp+=1;
                        }else{//solo si empatan
                            if($encuentro->first()->puntos_extras !== null){//si hay tiempo extra
                                if($encuentro->first()->puntos_extras > $encuentro->last()->puntos_extras)
                                {
                                    $pg+=1;
                                }elseif($encuentro->first()->puntos_extras < $encuentro->last()->puntos_extras)
                                {
                                    $pp+=1;
                                }
                            }else{
                                $pe+=1;
                            }
                        }
                    }else{
                        if($encuentro->last()->puntos_b > $encuentro->first()->puntos_b)
                        {
                            $pg+=1;
                        }elseif($encuentro->last()->puntos_b < $encuentro->first()->puntos_b)
                        {
                            $pp+=1;
                        }else{
                            if($encuentro->first()->puntos_extras !== null){//si hay tiempo extra
                                if($encuentro->last()->puntos_extras > $encuentro->first()->puntos_extras)
                                {
                                    $pg+=1;
                                }elseif($encuentro->last()->puntos_extras < $encuentro->first()->puntos_extras)
                                {
                                    $pp+=1;
                                }
                            }else{
                                $pe+=1;
                            }
                        }
                    }
                }

            }else{
                foreach ($participaciones as $participacion) {
                    # obtener la suma de puntos y goles para futbol
                        
                        $puntos_b_favor += $participacion->puntos_b;
                        $puntos_total += $participacion->puntos;
                        $pj+=1;
                        array_push($id_encuentros, $participacion->id_encuentro);
                }
                $encuentros_club = Encuentro_Club_Participacion::whereIn('id_encuentro',$id_encuentros)
                                                                ->where('puntos_b','!=',NULL)
                                                                ->where('puntos','!=',NULL)
                                                                ->orderBy('id_encuentro')->get();

                foreach ($encuentros_club as $encuentro) {
                    if ($encuentro->id_club_part != $id_club_part1) {
                        $puntos_b_contra += $encuentro->puntos_b;
                    }
                }
                
               

                foreach ($encuentros_club->groupBy('id_encuentro') as $encuentro) {
                    /* echo($id_club_part1);
                    echo($encuentro->first()->id_club_part); */
    
                    if ($encuentro->first()->id_club_part == $id_club_part1) {
                        /* echo($encuentro->first()->goles);
                        echo($encuentro->last()->goles); */
                        if($encuentro->first()->puntos_b > $encuentro->last()->puntos_b)
                        {
                            $pg+=1;
                        }elseif($encuentro->first()->puntos_b < $encuentro->last()->puntos_b)
                        {
                                $pp+=1;
                        }else{
                                $pe+=1;
                        }
                    }else{
                        if($encuentro->last()->puntos_b > $encuentro->first()->puntos_b)
                        {
                            $pg+=1;
                        }elseif($encuentro->last()->puntos_b < $encuentro->first()->puntos_b)
                        {
                            $pp+=1;
                        }else{
                            $pe+=1;
                        }
                    }
                }

            }
            Tabla_Posicion::where('id_club_part',$id_club_part1)->where('id_fase',$id_fase)
                        ->update(['puntos' => $puntos_total,
                                  'gf'=>$puntos_b_favor,
                                  'gc'=>$puntos_b_contra,
                                  'dg'=>($puntos_b_favor-$puntos_b_contra),
                                  'pj'=>$pj,
                                  'pg'=>$pg,
                                  'pp'=>$pp,
                                  'pe'=>$pe,
                                  ]);

        }
        return redirect()->back();  
    }
    public function reg_resultado_set(request $request){
        //dd($request);
        $set_jugados = $request->get('set_jugados');

        /* dd($set_jugados); */

        $id_enc = $request->get('id_enc');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');

        $fase = Fase::find($id_fase);
        $fase_tipo = $fase->fase_tipos->first()->tipos->nombre_tipo;

       
        //REGISTRAR  EN ENCUENTRO CLUB PARTICIPACIONES SET
        $disc = Disciplina::find($request->get('id_disc'));

        for ($i=1; $i <= 2; $i++) {
            $puntos = $request->get('puntos'.$i);
            $set_ganados = $request->get('set_ganados'.$i);
            $observacion = $request->get('observacion'.$i);
            $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);

            $set1 = $request->get('set1'.$i);
            $set2 = $request->get('set2'.$i);
            $set3 = $request->get('set3'.$i);
            $set4 = $request->get('set4'.$i);
            $set5 = $request->get('set5'.$i);

            if ($set_jugados == "3") 
            {
                Encuentro_Club_Participaciones_Set::where('id_encuentro_club_part_set', $id_encuentro_club_part)
                        ->update(['puntos' => $puntos,
                                  'puntos_set1'=>$set1, 
                                  'puntos_set2'=>$set2, 
                                  'puntos_set3'=>$set3, 
                                  'set_ganados'=>$set_ganados,
                                  'set_jugados'=>$set_jugados,
                                  'observacion'=>$observacion]);
            }
            elseif($set_jugados == "4")
            {
                Encuentro_Club_Participaciones_Set::where('id_encuentro_club_part_set', $id_encuentro_club_part)
                ->update(['puntos' => $puntos,
                          'puntos_set1'=>$set1, 
                          'puntos_set2'=>$set2, 
                          'puntos_set3'=>$set3, 
                          'puntos_set4'=>$set4, 
                          'set_ganados'=>$set_ganados,
                          'set_jugados'=>$set_jugados,
                          'observacion'=>$observacion]);
            }elseif($set_jugados == "5")
            {
                Encuentro_Club_Participaciones_Set::where('id_encuentro_club_part_set_set', $id_encuentro_club_part)
                ->update(['puntos' => $puntos,
                          'puntos_set1'=>$set1, 
                          'puntos_set2'=>$set2, 
                          'puntos_set3'=>$set3, 
                          'puntos_set4'=>$set4, 
                          'puntos_set4'=>$set5, 
                          'set_ganados'=>$set_ganados,
                          'set_jugados'=>$set_jugados,
                          'observacion'=>$observacion]);
            }
        }                                   
        //ACUTALIZAR_TABLA DE POSICIONES
        //CLUB1 y club2
        //1.obtener sus participaciones

        for ($i=1; $i <= 2; $i++) 
        {
            $id_club = $request->get('id_club'.$i);
            $id_club_part1= Club_Participacion::where('id_club',$id_club)
                                                ->where('id_disc',$id_disc)
                                                ->where('id_gestion',$id_gestion)
                                                ->get()->last()->id_club_part;
            $pj=0;
            $pg=0;
            $pp=0;
            $sf=0;
            $sc=0;
            $pf=0;
            $pc=0;
            $puntos_total=0;
            $id_encuentros=[];

            $participaciones = Encuentro_Club_Participaciones_Set::where('id_club_part',$id_club_part1)
                                                            ->where('id_fase',$id_fase)
                                                            ->where('set_jugados','!=',NULL)
                                                            ->where('set_ganados','!=',NULL)
                                                            ->where('puntos','!=',NULL)->get();
            
            //SETS A FAVOR Y PUNTOS TOTAL Y PARTIDOS  JUGADOS
            foreach ($participaciones as $participacion) {

                $pf += $participacion->puntos_set1;
                $pf += $participacion->puntos_set2;
                $pf += $participacion->puntos_set3;

                if ($participacion->set_jugados == "4")
                {
                    $pf += $participacion->puntos_set4;
                }elseif($participacion->set_jugados == "5") 
                {
                    $pf += $participacion->puntos_set4;
                    $pf += $participacion->puntos_set5;
                }

                $sf += $participacion->set_ganados;
                $puntos_total += $participacion->puntos;
                $pj+=1;
                array_push($id_encuentros, $participacion->id_encuentro);
            }

            $encuentros_club = Encuentro_Club_Participaciones_Set::whereIn('id_encuentro',$id_encuentros)
                                                                    ->where('set_jugados','!=',NULL)
                                                                    ->where('set_ganados','!=',NULL)
                                                                    ->where('puntos','!=',NULL)
                                                                    ->orderBy('id_encuentro')->get();
            //SETS EN CONTRA
            foreach ($encuentros_club as $encuentro) {
                if ($encuentro->id_club_part != $id_club_part1) {
                    $pc += $encuentro->puntos_set1;
                    $pc += $encuentro->puntos_set2;
                    $pc += $encuentro->puntos_set3;

                    if($encuentro->set_jugados == "4"){
                        $pc += $encuentro->puntos_set4;
                    }elseif($encuentro->set_jugados == "5") {
                        $pc += $encuentro->puntos_set4;
                        $pc += $encuentro->puntos_set5;
                    }
                    $sc += $encuentro->set_ganados;
                }
            }
            
            foreach ($encuentros_club->groupBy('id_encuentro') as $encuentro) {

                if ($encuentro->first()->id_club_part == $id_club_part1) {//SI ESTE ES EL EQUIPO

                    if($encuentro->first()->set_ganados > $encuentro->last()->set_ganados)
                    {
                        $pg+=1;
                    }elseif($encuentro->first()->set_ganados < $encuentro->last()->set_ganados)
                    {
                            $pp+=1;
                    }
                }else{
                    if($encuentro->last()->set_ganados > $encuentro->first()->set_ganados)
                    {
                        $pg+=1;
                    }elseif($encuentro->last()->set_ganados < $encuentro->first()->set_ganados)
                    {
                        $pp+=1;
                    }
                }
            }

            Tabla_Posiciones_Set::where('id_club_part',$id_club_part1)->where('id_fase',$id_fase)
                        ->update(['puntos' => $puntos_total,
                                  'sf'=>$sf,
                                  'sc'=>$sc,
                                  'ds'=>($sf-$sc),
                                  'pf'=>$pf,
                                  'pc'=>$pc,
                                  'dp'=>($pf-$pc),
                                  'pj'=>$pj,
                                  'pg'=>$pg,
                                  'pp'=>$pp,
                                  ]);
        } 
        return redirect()->back();  
    }
    public function update_reg_resultado(request $request){
        //return $request;
        $id_encuentro = $request->get('id_encuentro1');
        $id_disc = $request->get('id_disc');
        $id_gestion = $request->get('id_gestion');
        $id_fase = $request->get('id_fase');


        //registrar en la tabla de posicion
        /*  for ($i = 1; $i <= 2 ; $i++) {
            $id_club = $request->get('id_club'.$i);
            
            $id_club_part = Club_Participacion::where('id_club',$id_club)
                ->where('id_disc',$id_disc)
                ->where('id_gestion',$id_gestion)
                ->get()->last()->id_club_part;
                //return dd($id_club_part);

            $tabla = DB::table('tabla_posicions')
            ->where('id_club_part',$id_club_part)
            ->where('id_fase',$id_fase)->get()->last();

            if (empty($tabla)){ 
                $tabla_posicion = new Tabla_Posicion();
                $tabla_posicion->id_club_part = $id_club_part;
                $tabla_posicion->id_fase = $id_fase;
                $tabla_posicion->pj= 1;
                $tabla_posicion->save();               
            }else {
                $pjug = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)->get()->last()->pj;
                
                Tabla_Posicion::where('id_club_part','=',$id_club_part)->where('id_fase',$id_fase)
                ->update(['pj' => $pjug+1]);
            }//actualiza partidos jugados
        } */
        $disc = Disciplina::find($request->get('id_disc'));
        $j = 2;
        //registar en encuentro_club_participacion
        for ($i=1; $i <= 2; $i++) {
            $puntos = $request->get('punto'.$i);
            $observacion = $request->get('observacion'.$i);
            //para encuentro club participacion
            if ($disc->es_futbol($disc->id_disc)) {
                $goles = $request->get('goles'.$i);
                $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
                $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

                $id_club = $request->get('id_club'.$i);
                $id_club_part = Club_Participacion::where('id_club',$id_club)
                        ->where('id_disc',$id_disc)
                        ->where('id_gestion',$id_gestion)
                        ->get()->last()->id_club_part;

                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'goles'=>$goles,'observacion'=>$observacion]);
            } else {
                $id_encuentro_club_part = $request->get('id_encuentro_club_part'.$i);
                $encuentro_club_part = Encuentro_Club_Participacion::find($id_encuentro_club_part);

                $id_club = $request->get('id_club'.$i);
                $id_club_part = Club_Participacion::where('id_club',$id_club)
                        ->where('id_disc',$id_disc)
                        ->where('id_gestion',$id_gestion)
                        ->get()->last()->id_club_part;

                Encuentro_Club_Participacion::where('id_encuentro_club_part', $id_encuentro_club_part)
                    ->update(['puntos' => $puntos, 'observacion'=>$observacion]);
            }

                $puntos_total = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->select('puntos')->get()->last()->puntos;
                    $puntos_total = $puntos_total + $puntos;
                
                $puntos1 = $request->get('punto'.$i);
                $puntos2 = $request->get('punto'.$j);
                
            if ($puntos1 > $puntos2) {
                $pg = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                ->select('pg')->get()->last()->pg;
                $pg = $pg + 1;
                Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                ->update(['puntos' => $puntos_total, 'pg'=>$pg]);
            }
            else {
                if ($puntos1 < $puntos2) {
                    $pp = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                        ->select('pp')->get()->last()->pp;
                        $pp = $pp + 1;
                    Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                        ->update(['puntos' => $puntos_total,'pp'=>$pp]);   
                }
                else {
                    $pe = Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->select('pe')->get()->last()->pe;
                    $pe = $pe + 1;
                    
                    Tabla_Posicion::where('id_club_part',$id_club_part)->where('id_fase',$id_fase)
                    ->update(['puntos' => $puntos_total,'pe'=>$pe]);
                }
            }
                    $j = 1;
        }
        return redirect()->back();  
    }

    public function reg_res_competicion(Request $request){
        if($request->ajax()){
            $id_fase = $request->fase;
            $id_disc = $request->disc;
            $disciplina= Disciplina::find($id_disc);
            $id_grupo = $request->grupo;
            $id_gestion = $request->gestion;
            $id_encuentro = $request->encuentro;
            
            foreach ($request->tabla as $jugador){
                $id_seleccion = DB::table('jugador_clubs')
                    ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                    ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                    ->where('jugador_clubs.id_jugador',$jugador[0])
                    ->where('jugador_clubs.id_club',$jugador[1])
                    ->where('club_participaciones.id_club',$jugador[1])
                    ->where('club_participaciones.id_disc',$id_disc)
                    ->where('club_participaciones.id_gestion',$id_gestion)
                    ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;

                    if ($disciplina->es_raquetaFronton($id_disc) == 2) {
                        Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                        ->where('id_encuentro',$id_encuentro)
                        ->update(['posicion' => $jugador[2],
                                    'puntos_set1' => $jugador[4],
                                    'puntos_set2' => $jugador[5],
                                    'puntos_set3' => $jugador[6],
                                    'set_ganados' => $jugador[7],
                                    'set_jugados' =>'3']);
                    } else {
                        Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                        ->where('id_encuentro',$id_encuentro)
                        ->update(['posicion' => $jugador[2],
                                    'tiempo' => $jugador[3]]);
                    }
            }
            $fechas =Fase::find($id_fase)->fechas;
            
            if ($disciplina->es_raquetaFronton($id_disc) == 2) {
                /* foreach($fechas as $fecha){
                    foreach ($fecha->fecha_grupos as $fg) {
                        if ($fg->id_grupo == $id_grupo) {
                            array_push($fechas_array,$fg->id_fecha);
                        } 
                    }
                } */
                $fechas_array=[];

                foreach($fechas as $fecha){
                    array_push($fechas_array,$fecha->id_fecha);
                }
                $encuentros_fases=Encuentro::whereIn('id_fecha',$fechas_array)->get();
                $encuentros_array=[];
                foreach($encuentros_fases as $e){
                    array_push($encuentros_array,$e->id_encuentro);
                }

                foreach ($request->tabla as $jugador) {
                    $puntos_total = 0;
                    $pj=0;
                    $pg=0;
                    $pp=0;
                    $sf=0;
                    $sc=0;
                    $pf=0;
                    $pc=0;
                    $encuentros_jug=[];

                    $id_seleccion = DB::table('jugador_clubs')
                    ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                    ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                    ->where('jugador_clubs.id_jugador',$jugador[0])
                    ->where('jugador_clubs.id_club',$jugador[1])
                    ->where('club_participaciones.id_club',$jugador[1])
                    ->where('club_participaciones.id_disc',$id_disc)
                    ->where('club_participaciones.id_gestion',$id_gestion)
                    ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                    //todos los encuentros de la fase del grupo
                    $encuentro_selecciones = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                                                                ->whereIn('id_encuentro',$encuentros_array)
                                                                ->where('posicion','!=',null)
                                                                ->orderBy('id_encuentro')
                                                                ->get();
                
                //SETS A FAVOR Y PUNTOS TOTAL Y PARTIDOS  JUGADOS
                foreach ($encuentro_selecciones as $participacion) {
    
                    $pf += $participacion->puntos_set1;
                    $pf += $participacion->puntos_set2;
                    $pf += $participacion->puntos_set3;
    
                    $sf += $participacion->set_ganados;

                    $puntos_total += $participacion->posicion;
                    $pj+=1;
                    array_push($encuentros_jug, $participacion->id_encuentro);
                }

                    //obtengo los encutentros de competidores 2
                    $encuentro_selecciones_jug = Encuentro_Seleccion::whereIn('id_encuentro',$encuentros_jug)
                                                                ->where('posicion','!=',null)
                                                                ->where('set_jugados','!=',NULL)
                                                                ->where('set_ganados','!=',NULL)
                                                                ->orderBy('id_encuentro')
                                                                ->get();
            //SETS EN CONTRA
                foreach ($encuentro_selecciones_jug as $encuentro) {
                    if ($encuentro->id_seleccion != $id_seleccion) {
                        $pc += $encuentro->puntos_set1;
                        $pc += $encuentro->puntos_set2;
                        $pc += $encuentro->puntos_set3;

                        $sc += $encuentro->set_ganados;
                    }
                }
                
                foreach ($encuentro_selecciones_jug->groupBy('id_encuentro') as $encuentro) {

                    if ($encuentro->first()->id_seleccion == $id_seleccion) {//SI ESTE ES EL EQUIPO

                        if($encuentro->first()->set_ganados > $encuentro->last()->set_ganados)
                        {
                            $pg+=1;
                        }elseif($encuentro->first()->set_ganados < $encuentro->last()->set_ganados)
                        {
                                $pp+=1;
                        }
                    }else{
                        if($encuentro->last()->set_ganados > $encuentro->first()->set_ganados)
                        {
                            $pg+=1;
                        }elseif($encuentro->last()->set_ganados < $encuentro->first()->set_ganados)
                        {
                            $pp+=1;
                        }
                    }
                }

                Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                                    ->update(['puntos' => $puntos_total,
                                        'sf'=>$sf,
                                        'sc'=>$sc,
                                        'ds'=>($sf-$sc),
                                        'pf'=>$pf,
                                        'pc'=>$pc,
                                        'dp'=>($pf-$pc),
                                        'pj'=>$pj,
                                        'pg'=>$pg,
                                        'pp'=>$pp,
                                    ]);
    
                }
            }else{
                //dd("series");
                $fechas_array=[];

                foreach($fechas as $fecha){
                    array_push($fechas_array,$fecha->id_fecha);
                }
                $encuentros_fases=Encuentro::whereIn('id_fecha',$fechas_array)->get();
                $encuentros_array=[];
                foreach($encuentros_fases as $e){
                    array_push($encuentros_array,$e->id_encuentro);
                }

                foreach ($request->tabla as $jugador) {
                    $puntos_total = 0;
                    $pe=0;
                    $pg=0;
                    $pp=0;
                    $encuentros_jug=[];
                    $suma_posiciones = 0; 
                    $cantidad_encuentros = 0;   
                    $id_seleccion = DB::table('jugador_clubs')
                    ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                    ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                    ->where('jugador_clubs.id_jugador',$jugador[0])
                    ->where('jugador_clubs.id_club',$jugador[1])
                    ->where('club_participaciones.id_club',$jugador[1])
                    ->where('club_participaciones.id_disc',$id_disc)
                    ->where('club_participaciones.id_gestion',$id_gestion)
                    ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                    //todos los encuentros de la fase del grupo


                    if($disciplina->es_ajedrez($id_disc) == 1){
                        $encuentro_selecciones = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                        ->whereIn('id_encuentro',$encuentros_array)
                        ->where('posicion','!=',null)
                        ->get();

                        foreach ($encuentro_selecciones as $participacion) {
                            array_push($encuentros_jug, $participacion->id_encuentro);
                        }

                        $encuentro_selecciones_jug = Encuentro_Seleccion::whereIn('id_encuentro',$encuentros_jug)
                                                                ->where('posicion','!=',null)
                                                                ->orderBy('id_encuentro')
                                                                ->get();

                        foreach ($encuentro_selecciones_jug->groupBy('id_encuentro') as $encuentro) {

                            if ($encuentro->first()->id_seleccion == $id_seleccion) {//SI ESTE ES EL EQUIPO
        
                                if($encuentro->first()->posicion > $encuentro->last()->posicion)
                                {
                                    $pg+=1;
                                }elseif($encuentro->first()->posicion < $encuentro->last()->posicion)
                                {
                                        $pp+=1;
                                }elseif($encuentro->first()->posicion == $encuentro->last()->posicion)
                                {
                                    $pe+=1;
                                }
                            }else{
                                if($encuentro->last()->posicion > $encuentro->first()->posicion)
                                {
                                    $pg+=1;
                                }elseif($encuentro->last()->posicion < $encuentro->first()->posicion)
                                {
                                    $pp+=1;
                                }elseif($encuentro->first()->posicion == $encuentro->last()->posicion)
                                {
                                    $pe+=1;
                                }
                            }
                        }

                        foreach ($encuentro_selecciones as $encuentro_jug) {
                            /* $tiempo_total+=$encuentro_jug->tiempo; */
                            $cantidad_encuentros+=1;
                            $suma_posiciones+=$encuentro_jug->posicion;
    
                            Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                                                    ->update(['cantidad_encuentros' => $cantidad_encuentros,
                                                              'posicion' => $suma_posiciones,
                                                              'pg' => $pg,
                                                              'pe' => $pe,
                                                              'pp' => $pp,
                                                              ]);
    
                        }
                    
                
                
                }else{
                        $encuentro_selecciones = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                        ->whereIn('id_encuentro',$encuentros_array)
                        ->where('posicion','!=',null)
                        ->where('tiempo','!=',null)
                        ->get();
                    
                    
                    
                        foreach ($encuentro_selecciones as $encuentro_jug) {
                            /* $tiempo_total+=$encuentro_jug->tiempo; */
                            $cantidad_encuentros+=1;
                            $suma_posiciones+=$encuentro_jug->posicion;
                            $tiempo_total = $encuentro_jug->tiempo;

                            Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                            ->update(['cantidad_encuentros' => $cantidad_encuentros,'posicion' => $suma_posiciones,'tiempo_total' => $tiempo_total]);

                        }
    
                    }
    
                }
            }
        }
        return $request;  
    }
//no sirve
    public function reg_res_competicion_eliminacion(Request $request){
        if($request->ajax()){
            $id_fase = $request->fase;
            $id_disc = $request->disc;
            $disciplina= Disciplina::find($id_disc);
            $id_gestion = $request->gestion;
            $id_encuentro = $request->encuentro;

            foreach ($request->tabla as $jugador){
                $id_seleccion = DB::table('jugador_clubs')
                                ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                                ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                                ->where('jugador_clubs.id_jugador',$jugador[0])
                                ->where('jugador_clubs.id_club',$jugador[1])
                                ->where('club_participaciones.id_club',$jugador[1])
                                ->where('club_participaciones.id_disc',$id_disc)
                                ->where('club_participaciones.id_gestion',$id_gestion)
                                ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;

                                if ($disciplina->es_raquetaFronton($id_disc) == 2) {
                                    Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                                    ->where('id_encuentro',$id_encuentro)
                                    ->update(['posicion' => $jugador[2],
                                              'puntos_set1' => $jugador[4],
                                              'puntos_set2' => $jugador[5],
                                              'puntos_set3' => $jugador[6],
                                              'set_ganados' => $jugador[7],
                                              'set_jugados' =>'3']);
                                } else {
                                    Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                                    ->where('id_encuentro',$id_encuentro)
                                    ->update(['posicion' => $jugador[2],
                                              'tiempo' => $jugador[3]]);
                                }
            }
            $fechas =Fase::find($id_fase)->fechas;
            dd($fechas);
            $fechas_array=[];
            //obtener las fechas de esta fase
            foreach($fechas as $fecha){
                /* foreach ($fecha->fecha_grupos as $fg) { */
                array_push($fechas_array,$fecha->id_fecha);
                /* } */
            }
            $encuentros_fases=Encuentro::whereIn('id_fecha',$fechas_array)->get();
            $encuentros_array=[];
            foreach($encuentros_fases as $e){
                array_push($encuentros_array,$e->id_encuentro);
            }

            if ($disciplina->es_raquetaFronton($id_disc) == 2) {
                foreach ($request->tabla as $jugador) {
                    $puntos_total = 0;
                    $pj=0;
                    $pg=0;
                    $pp=0;
                    $sf=0;
                    $sc=0;
                    $pf=0;
                    $pc=0;
                    $encuentros_jug=[];

                    $id_seleccion = DB::table('jugador_clubs')
                    ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                    ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                    ->where('jugador_clubs.id_jugador',$jugador[0])
                    ->where('jugador_clubs.id_club',$jugador[1])
                    ->where('club_participaciones.id_club',$jugador[1])
                    ->where('club_participaciones.id_disc',$id_disc)
                    ->where('club_participaciones.id_gestion',$id_gestion)
                    ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                    
                    //todos los encuentros de la fase del grupo
                    $encuentro_selecciones = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                                                                ->whereIn('id_encuentro',$encuentros_array)
                                                                ->where('posicion','!=',null)
                                                                ->orderBy('id_encuentro')
                                                                ->get();
                
                    //SETS A FAVOR Y PUNTOS TOTAL Y PARTIDOS  JUGADOS
                    foreach ($encuentro_selecciones as $participacion) {
        
                        $pf += $participacion->puntos_set1;
                        $pf += $participacion->puntos_set2;
                        $pf += $participacion->puntos_set3;
        
                        $sf += $participacion->set_ganados;

                        $puntos_total += $participacion->puntos;
                        $pj+=1;
                        array_push($encuentros_jug, $participacion->id_encuentro);
                    }

                    //obtengo los encutentros de competidores 2
                    $encuentro_selecciones_jug = Encuentro_Seleccion::whereIn('id_encuentro',$encuentros_jug)
                                                                    ->where('posicion','!=',null)
                                                                    ->where('set_jugados','!=',NULL)
                                                                    ->where('set_ganados','!=',NULL)
                                                                    ->orderBy('id_encuentro')
                                                                    ->get();
                    //SETS EN CONTRA
                    foreach ($encuentro_selecciones_jug as $encuentro) {
                        if ($encuentro->id_seleccion != $id_seleccion) {
                            $pc += $encuentro->puntos_set1;
                            $pc += $encuentro->puntos_set2;
                            $pc += $encuentro->puntos_set3;

                            $sc += $encuentro->set_ganados;
                        }
                    }
                    
                    foreach ($encuentro_selecciones_jug->groupBy('id_encuentro') as $encuentro) {

                        if ($encuentro->first()->id_seleccion == $id_seleccion) {//SI ESTE ES EL EQUIPO

                            if($encuentro->first()->set_ganados > $encuentro->last()->set_ganados)
                            {
                                $pg+=1;
                            }elseif($encuentro->first()->set_ganados < $encuentro->last()->set_ganados)
                            {
                                    $pp+=1;
                            }
                        }else{
                            if($encuentro->last()->set_ganados > $encuentro->first()->set_ganados)
                            {
                                $pg+=1;
                            }elseif($encuentro->last()->set_ganados < $encuentro->first()->set_ganados)
                            {
                                $pp+=1;
                            }
                        }
                    }

                    Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)->where('id_fase',$id_fase)
                                    ->update(['puntos' => $puntos_total,
                                        'sf'=>$sf,
                                        'sc'=>$sc,
                                        'ds'=>($sf-$sc),
                                        'pf'=>$pf,
                                        'pc'=>$pc,
                                        'dp'=>($pf-$pc),
                                        'pj'=>$pj,
                                        'pg'=>$pg,
                                        'pp'=>$pp,
                                    ]);
    
                }
            }else{
                foreach ($request->tabla as $jugador) {
                    $tiempo_total = 0;
                    $suma_posiciones = 0; 
                    $cantidad_encuentros = 0; 
                    
                    
                    $id_seleccion = DB::table('jugador_clubs')
                    ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
                    ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
                    ->where('jugador_clubs.id_jugador',$jugador[0])
                    ->where('jugador_clubs.id_club',$jugador[1])
                    ->where('club_participaciones.id_club',$jugador[1])
                    ->where('club_participaciones.id_disc',$id_disc)
                    ->where('club_participaciones.id_gestion',$id_gestion)
                    ->select('selecciones.id_seleccion')->get()->last()->id_seleccion;
                    //todos los encuentros de la fase del grupo
                    $encuentro_selecciones = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
                                                                ->whereIn('id_encuentro',$encuentros_array)
                                                                ->where('posicion','!=',null)
                                                                ->where('tiempo','!=',null)
                                                                ->get();
                    
                    foreach ($encuentro_selecciones as $encuentro_jug) {
                        /* $tiempo_total+=$encuentro_jug->tiempo; */
                        $cantidad_encuentros+=1;
                        $suma_posiciones+=$encuentro_jug->posicion;
                        $tiempo_total = $encuentro_jug->tiempo;
                    }
    
                    Tabla_Posicion_Jugador::where('id_seleccion',$id_seleccion)
                                            ->where('id_fase',$id_fase)
                                            ->update(['cantidad_encuentros' =>$cantidad_encuentros,'posicion' => $suma_posiciones,'tiempo_total' => $tiempo_total]);
    
                }
            }
            
                       
            
            
        }
        return $request;  
    }
    public function select_contrincante($id_club, $id_grupo){
        $clubsParaEncuentro = DB::table('grupo_club_participaciones')
            ->join('club_participaciones','grupo_club_participaciones.id_club_part','=','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','=','clubs.id_club')
            ->where('grupo_club_participaciones.id_grupo','=',$id_grupo)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')
            ->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function select_contrincante_eliminacion($id_club, $id_fase){
        $clubsParaEncuentro = DB::table('fases')
            ->join('eliminaciones','fases.id_fase','eliminaciones.id_fase')
            ->join('club_participaciones','eliminaciones.id_club_part','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('fases.id_fase',$id_fase)
            ->where('clubs.id_club','!=',$id_club)
            ->select('clubs.*')->distinct()->get();
        return response()->json($clubsParaEncuentro);      
    }
    public function mostrar_resultado_ajax($id_encuentro){
        $data = DB::table('encuentros')
        ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
        ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->where('encuentros.id_encuentro',$id_encuentro)
        ->get();
        return response()->json($data);
    }
    public function mostrar_resultado_ajax_set($id_encuentro){
        $data = DB::table('encuentros')
        ->join('encuentro_club_participaciones_sets','encuentros.id_encuentro','encuentro_club_participaciones_sets.id_encuentro')
        ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
        ->join('clubs','club_participaciones.id_club','clubs.id_club')
        ->where('encuentros.id_encuentro',$id_encuentro)
        ->get();
        return response()->json($data);
    }
    public function mostrar_resultado_futbol_ajax($id_enc){
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        $id_encuentro_club_part1=0;
        $id_encuentro_club_part2=0;
        $puntos1=null;
        $puntos2=null;
        $puntos_extras1=null;
        $puntos_extras2=null;
        $penales=null;
        $penales=null;
        $observacion1=null;
        $observacion2=null;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
                $id_encuentro_club_part1 = $value->id_encuentro_club_part;
                $puntos1 = $value->puntos;
                $observacion1 = $value->observacion;

            } else {
                $club2=$value->id_club_part;
                $id_encuentro_club_part2 = $value->id_encuentro_club_part;
                $puntos2 = $value->puntos;
                $observacion2 = $value->observacion;

            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;
        $goles1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->select('encuentro_seleccions.posicion')->sum('encuentro_seleccions.posicion');
        $puntos_extras1 = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('encuentro_seleccions.id_encuentro',$id_enc)
        ->where('jugador_clubs.id_club',$id_club1)
        ->select('encuentro_seleccions.puntos_tiempo_extra')->sum('encuentro_seleccions.puntos_tiempo_extra');
        $penales1 = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('encuentro_seleccions.id_encuentro',$id_enc)
        ->where('jugador_clubs.id_club',$id_club1)
        ->select('encuentro_seleccions.penales')->sum('encuentro_seleccions.penales');
        $goles2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->select('encuentro_seleccions.posicion')->sum('encuentro_seleccions.posicion');
        $puntos_extras2 = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('encuentro_seleccions.id_encuentro',$id_enc)
        ->where('jugador_clubs.id_club',$id_club2)
        ->select('encuentro_seleccions.puntos_tiempo_extra')->sum('encuentro_seleccions.puntos_tiempo_extra');
        $penales2 = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->where('encuentro_seleccions.id_encuentro',$id_enc)
        ->where('jugador_clubs.id_club',$id_club2)
        ->select('encuentro_seleccions.penales')->sum('encuentro_seleccions.penales');
        $data = array('club1'  => $goles1,  
                    'club2' => $goles2,
                    'puntos_extras1' => $puntos_extras1,
                    'puntos_extras2' => $puntos_extras2,
                    'penales1' => $penales1,
                    'penales2' => $penales2,
                    'id_encuentro_club_part1'=> $id_encuentro_club_part1,
                    'id_encuentro_club_part2'=> $id_encuentro_club_part2,
                    'puntos1'=>$puntos1,
                    'puntos2'=>$puntos2,
                    'observacion1'=>$observacion1,
                    'observacion2'=>$observacion2,
            );
        
       // return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));
        
        return response()->json($data);
    }
    public function mostrar_resultado_basket_ajax($id_enc){
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        $id_encuentro_club_part1=0;
        $id_encuentro_club_part2=0;
        $puntos_b1=null;
        $puntos_b2=null;
        $puntos1=null;
        $puntos2=null;
        $puntos_extras1=null;
        $puntos_extras2=null;
        /* $penales=null;
        $penales=null; */
        $observacion1=null;
        $observacion2=null;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
                $id_encuentro_club_part1 = $value->id_encuentro_club_part;
                $puntos1 = $value->puntos;
                $puntos_b1 = $value->puntos_b;//=goles
                $puntos_extras1 = $value->puntos_extras;
                $observacion1 = $value->observacion;
            } else {
                $club2=$value->id_club_part;
                $id_encuentro_club_part2 = $value->id_encuentro_club_part;
                $puntos2 = $value->puntos;
                $puntos_b2 = $value->puntos_b;//=goles
                $puntos_extras2 = $value->puntos_extras;
                $observacion2 = $value->observacion;
            }
            $i++;
        }
        
        $data = array('club1'  => $puntos_b1,  
                    'club2' => $puntos_b2,
                    'puntos_extras1' => $puntos_extras1,
                    'puntos_extras2' => $puntos_extras2,
                    /* 'penales1' => $penales1,
                    'penales2' => $penales2, */
                    'id_encuentro_club_part1'=> $id_encuentro_club_part1,
                    'id_encuentro_club_part2'=> $id_encuentro_club_part2,
                    'puntos1'=>$puntos1,
                    'puntos2'=>$puntos2,
                    'observacion1'=>$observacion1,
                    'observacion2'=>$observacion2,
            );
        
       // return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));
        
        return response()->json($data);
    }
    public function mostrar_resultado_set_ajax($id_enc){
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        $id_encuentro_club_part1=0;
        $id_encuentro_club_part2=0;
        $puntos1=null;
        $puntos2=null;
        $puntos_set11 = null;
        $puntos_set21 = null;
        $puntos_set31 = null;
        $puntos_set41 = null;
        $puntos_set51 = null;
        $puntos_set12 = null;
        $puntos_set22 = null;
        $puntos_set32 = null;
        $puntos_set42 = null;
        $puntos_set52 = null;
        $observacion1=null;
        $observacion2=null;
        foreach ($encuentro->encuentro_club_participaciones_sets as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
                $id_encuentro_club_part1 = $value->id_encuentro_club_part_set;
                $puntos1 = $value->puntos;
                $puntos_set11 = $value->puntos_set1;
                $puntos_set21 = $value->puntos_set2;
                $puntos_set31 = $value->puntos_set3;
                $puntos_set41 = $value->puntos_set4;
                $puntos_set51 = $value->puntos_set5;
                $set_ganados1 = $value->set_ganados;
                $set_jugados1 = $value->set_jugados;
                $observacion1 = $value->observacion;

            } else {
                $club2=$value->id_club_part;
                $id_encuentro_club_part2 = $value->id_encuentro_club_part_set;
                $puntos2 = $value->puntos;
                $puntos_set12 = $value->puntos_set1;
                $puntos_set22 = $value->puntos_set2;
                $puntos_set32 = $value->puntos_set3;
                $puntos_set42 = $value->puntos_set4;
                $puntos_set52 = $value->puntos_set5;
                $set_ganados2 = $value->set_ganados;
                $set_jugados2 = $value->set_jugados;
                $observacion2 = $value->observacion;
            }
            $i++;
        }
        
        $data = array(
                    'id_encuentro_club_part1'=> $id_encuentro_club_part1,
                    'id_encuentro_club_part2'=> $id_encuentro_club_part2,
                    'puntos1'=>$puntos1,
                    'puntos2'=>$puntos2,
                    'observacion1'=>$observacion1,
                    'observacion2'=>$observacion2,
                    "puntos_set11"=>$puntos_set11,
                    "puntos_set21"=>$puntos_set21,
                    "puntos_set31"=>$puntos_set31,
                    "puntos_set41"=>$puntos_set41,
                    "puntos_set51"=>$puntos_set51,
                    "puntos_set12"=>$puntos_set12,
                    "puntos_set22"=>$puntos_set22,
                    "puntos_set32"=>$puntos_set32,
                    "puntos_set42"=>$puntos_set42,
                    "puntos_set52"=>$puntos_set52,
                    "set_ganados1"=>$set_ganados1,
                    "set_ganados2"=>$set_ganados2,
                    "set_jugados"=>$set_jugados1,
            );
        
        return response()->json($data);
    }

    public function mostrar_resultado_competicion_ajax($id_encuentro){
        /* $data = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
        ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
        ->join('clubs','jugador_clubs.id_club','clubs.id_club')
        ->where('encuentro_seleccions.id_encuentro',$id_encuentro)
        ->get(); */
        $enc = Encuentro::find($id_encuentro);
       
        /* if ($data->first()->set_jugados === NULL) { */
        if( $enc->es_set_competicion($id_encuentro) == 2 ){
            $data = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->join('clubs','jugador_clubs.id_club','clubs.id_club')
            ->where('encuentro_seleccions.id_encuentro',$id_encuentro)
            ->get();
        }else{
            $data = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->join('clubs','jugador_clubs.id_club','clubs.id_club')
            ->where('encuentro_seleccions.id_encuentro',$id_encuentro)
            ->orderBy('encuentro_seleccions.posicion')
            ->get();
        }
        
        return response()->json($data);
    }

    public function fixture_porfecha($id_fecha){        
        $fecha = Fecha::find($id_fecha); 
        $pdf = PDF::loadView('grupo.fixture',['fecha'=>$fecha]);
        return $pdf->download('fixture.pdf');
    }

    public function seleccion_series($id_enc,$id_gestion,$id_disc,$id_fase,$id_grupo){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase= Fase::find($id_fase);
        $grupo= Grupo::find($id_grupo);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;

        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;
        //return dd($id_club2);
        
        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
        if ($disciplina->es_futbol($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_series_futbol',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
       
        }elseif($disciplina->es_basket($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_series_basket',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
            
        }/* elseif($disciplina->es_set($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_series_set',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
            
        } */
    }
    public function seleccion_series_set($id_enc,$id_gestion,$id_disc,$id_fase,$id_grupo){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase = Fase::find($id_fase);
        $grupo = Grupo::find($id_grupo);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        foreach ($encuentro->encuentro_club_participaciones_sets as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;
        /* $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club; */
        //return dd($id_club2);
        
        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
        if($disciplina->es_raquetaFronton($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_series_rfronton',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
            
        }else{
            return view('encuentro.jugadores_seleccionados_series_set',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
        }
    }
    public function seleccion_eliminacion($id_enc,$id_gestion,$id_disc,$id_fase){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase= Fase::find($id_fase);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        foreach ($encuentro->encuentro_club_participaciones as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;

        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
<<<<<<< HEAD

        if($disciplina->es_futbol($disciplina->id_disc)== 1)
          return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase'/* ,'grupo' */,'encuentro'));  
        elseif($disciplina->es_basket($disciplina->id_disc)== 1)
          return view('encuentro.jugadores_seleccionados_eliminacion_basket',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase'/* ,'grupo' */,'encuentro'));  
    }
    public function seleccion_eliminacion_set($id_enc,$id_gestion,$id_disc,$id_fase){  
        $gestion = Gestion::find($id_gestion);
        $disciplina = Disciplina::find($id_disc);
        $fase= Fase::find($id_fase);
        $club1 = 0;
        $club2 = 0;
        $encuentro = Encuentro::find($id_enc);
        $i=0;
        foreach ($encuentro->encuentro_club_participaciones_sets as $value) {
            if ($i==0) {
                $club1=$value->id_club_part;
            } else {
                $club2=$value->id_club_part;
            }
            $i++;
        }
        $id_club1 = Club_Participacion::find($club1)->id_club;
        $id_club2 = Club_Participacion::find($club2)->id_club;

        $jug_hab1 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->get();
        $selec1  = array();
            foreach ($jug_hab1 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_hab2 = DB::table('encuentro_seleccions')
            ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_seleccions.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->get();
        $selec2  = array();
            foreach ($jug_hab2 as $value) {
               $selec1[] = $value->id_jugador;
            }
        $jug_disp1 = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club1)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get();
        
        $jug_disp2 = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_enc)
            ->where('jugador_clubs.id_club',$id_club2)
            ->whereNotIn('jugadores.id_jugador', $selec1)
            ->select('jugadores.*')
            ->get(); 
        
        $club1 =Club::find($id_club1);
        $club2 =Club::find($id_club2);
        if($disciplina->es_raquetaFronton($disciplina->id_disc)== 1)
            return view('encuentro.jugadores_seleccionados_eliminacion_raqueta_fronton',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase'/* ,'grupo' */,'encuentro'));
        else
            return view('encuentro.jugadores_seleccionados_eliminacion_set',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase'/* ,'grupo' */,'encuentro'));  

=======
        if ($disciplina->es_futbol($disciplina->id_disc)) {
            return view('encuentro.jugadores_seleccionados_eliminacion_futbol',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  

        } else {
            return view('encuentro.jugadores_seleccionados_eliminacion',compact('club1','club2','jug_hab1','jug_hab2','jug_disp1','jug_disp2','gestion','disciplina','fase','grupo','encuentro'));  
            
        }
>>>>>>> refs/remotes/origin/master
    }
    
    public function agregar_jugador_encuentro(request $request){
        $id_encuentro = $request->get('id_encuentro');
        // $id_gestion = $request->get('id_gestion');
        $id_disc = $request->get('id_disc');
        $disciplina = Disciplina::find($id_disc);
        // $id_club = $request->get('id_club');
        $id_jugador = $request->get('id_jugador');

        foreach($id_jugador as $id_jug){
            if ($disciplina->es_set($id_disc) || $disciplina->es_raquetaFronton($id_disc)) {
                $id_seleccion = DB::table('encuentro_club_participaciones_sets')
                ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
                ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
                ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                ->where('encuentro_club_participaciones_sets.id_encuentro',$id_encuentro)
                ->where('jugadores.id_jugador', $id_jug)
                ->select('selecciones.id_seleccion')
                ->get()->last()->id_seleccion;
            } else {
                $id_seleccion = DB::table('encuentro_club_participaciones')
                ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
                ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
                ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
                ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
                ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
                ->where('jugadores.id_jugador', $id_jug)
                ->select('selecciones.id_seleccion')
                ->get()->last()->id_seleccion;
            }
            
            

            $encuentro_selec = new Encuentro_Seleccion();
            $encuentro_selec->id_encuentro = $id_encuentro;
            $encuentro_selec->id_seleccion = $id_seleccion;
            $encuentro_selec->save();
        }
        return redirect()->back();
    }
    public function eliminar_jugador_encuentro($id_encuentro,$id_jugador){
        $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
        $id_encuentro_seleccion = Encuentro_Seleccion::
            where('id_encuentro',$id_encuentro)
            ->where('id_seleccion',$id_seleccion)->get()->last()->id_encuentro_seleccion;
            $enc_selec = Encuentro_Seleccion::find($id_encuentro_seleccion)->delete();
        return redirect()->back();
    }
    public function eliminar_jugador_encuentro_set($id_encuentro,$id_jugador){
        $id_seleccion = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
        $id_encuentro_seleccion = Encuentro_Seleccion::
            where('id_encuentro',$id_encuentro)
            ->where('id_seleccion',$id_seleccion)->get()->last()->id_encuentro_seleccion;
            $enc_selec = Encuentro_Seleccion::find($id_encuentro_seleccion)->delete();
        return redirect()->back();
    }
    public function reg_gol_jugador_ajax($id_enc,$id_jug){
        $jugador = Jugador::find($id_jug);
        return $jugador;
    }
    public function store_gol_jugador(request $request){
        $id_encuentro = $request->get('id_encuentro');
        $id_jugador = $request->get('id_jugador');
        $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
            
        $cant_goles = $request->get('goles');
        $tr = $request->get('tr');
        $ta = $request->get('ta');
        $puntos_extras = $request->get('puntos_extra');
        $penales = $request->get('penales');
        $enc_selec = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
            ->where('id_encuentro',$id_encuentro)->update(['posicion'=>$cant_goles,'tr'=>$tr,'ta'=>$ta,'puntos_tiempo_extra'=>$puntos_extras,'penales'=>$penales]);
        return redirect()->back();
    }
    public function store_puntos_jugador(request $request){
        $id_encuentro = $request->get('id_encuentro');
        $disciplina = Disciplina::find($request->get('id_disc'));
        $id_jugador = $request->get('id_jugador');

        if ($disciplina->es_set($request->get('id_disc')) || $disciplina->es_raquetaFronton($request->get('id_disc'))) {
            $id_seleccion = DB::table('encuentro_club_participaciones_sets')
            ->join('club_participaciones','encuentro_club_participaciones_sets.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones_sets.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
        } else {
            $id_seleccion = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('selecciones','club_participaciones.id_club_part','selecciones.id_club_part')
            ->join('jugador_clubs','selecciones.id_jug_club','jugador_clubs.id_jug_club')
            ->join('jugadores','jugador_clubs.id_jugador','jugadores.id_jugador')
            ->where('encuentro_club_participaciones.id_encuentro',$id_encuentro)
            ->where('jugadores.id_jugador', $id_jugador)
            ->select('selecciones.id_seleccion')
            ->get()->last()->id_seleccion;
        }
        $destacado = $request->get('destacado');
        $faltas = $request->get('faltas');
        //$ta = $request->get('ta');
        //$puntos_extras = $request->get('puntos_extra');
        //$penales = $request->get('penales');
        $enc_selec = Encuentro_Seleccion::where('id_seleccion',$id_seleccion)
            ->where('id_encuentro',$id_encuentro)
            ->update(['posicion'=>$destacado,'faltas'=>$faltas ]);

        return redirect()->back();
    }
}