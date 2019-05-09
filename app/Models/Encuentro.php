<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jugador;
use App\Models\Jugador_Club;
use App\Models\Seleccion;
use App\Models\Fecha;
use App\Models\Fecha_Grupo;
use App\Models\Encuentro_Club_Participacion;
use App\Models\Encuentro_Club_Participaciones_Set;
use App\Models\Club_Participacion;
use App\Models\Encuentro_Seleccion;
use Illuminate\Support\Facades\DB;
use Date;

class Encuentro extends Model
{
    protected $table = 'encuentros';
	protected $primaryKey = 'id_encuentro';
    protected $fillable = [
    	'fecha', 
    	'hora',
    	'id_centro',
        'detalle',
    	'id_fecha',
    ];
    protected $hidden = ['remember_token'];
    
    public function encuentro_club_participaciones(){
    	return $this->hasMany('App\Models\Encuentro_Club_Participacion','id_encuentro');
    }
    public function encuentro_club_participaciones_sets(){
    	return $this->hasMany('App\Models\Encuentro_Club_Participaciones_Set','id_encuentro');
    }
    public function encuentro_seleccion(){
    	return $this->hasMany('App\Models\Encuentro_Seleccion','id_encuentro_seleccion');
    }
    public function Fecha(){
    	return $this->belongsTo('App\Models\Fecha','id_fecha');
    }
    public function centro(){
    	return $this->belongsTo('App\Models\Centro','id_centro');
    }
    public function jugadores($id_encuentro){
        $jugadores = DB::table('jugadores')
            ->join('jugador_clubs','jugadores.id_jugador','jugador_clubs.id_jugador')
            ->join('selecciones','jugador_clubs.id_jug_club','selecciones.id_jug_club')
            ->join('encuentro_seleccions','selecciones.id_seleccion','encuentro_seleccions.id_seleccion')
            ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('encuentro_seleccions.id_encuentro','=',$id_encuentro)
            //->orderBy('encuentro_seleccions.posicion')
            //->where('club_participaciones.id_disc',$id_disc)
            ->select('jugadores.*','clubs.*','encuentro_seleccions.*')->get();
        
        return $jugadores;
    }
    public function participaciones($id_encuentro){
        $participantes = DB::table('fechas_grupos')
            ->join('fechas','fechas_grupos.id_fecha','fechas.id_fecha')
            ->join('encuentros','fechas.id_fecha','encuentros.id_fecha')
            ->join('encuentro_club_participaciones','encuentros.id_encuentro','encuentro_club_participaciones.id_encuentro')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('clubs','club_participaciones.id_club','clubs.id_club')
            ->where('encuentros.id_encuentro',$id_encuentro)
            ->get();
        return $participantes;
    }
    public function tiene_resultado($id_encuentro){
<<<<<<< HEAD
        $res = Encuentro_Club_participacion::where('id_encuentro',$id_encuentro)->get();
        if ($res->last()->puntos === NULL) {
            return 0;
        }
        else {
            return 1;
        }
    }
    public function tiene_resultado_set($id_encuentro){
        $res = Encuentro_Club_Participaciones_Set::where('id_encuentro',$id_encuentro)->get();
        if ($res->last()->puntos === NULL) {
            return 0;
=======
        $res = Encuentro_Club_participacion::where('id_encuentro',$id_encuentro)->get()->last();
        if (empty($res)) {
            return 1;
>>>>>>> refs/remotes/origin/master
        }
        else {
            return 0;
        }
    }
    public function formato_fecha($fecha)
    {
        $date = new Date($fecha);
        $fecha_formato = $date->format('l, j F Y');
        
            return $fecha_formato;
    }
    public function formato_hora($hora)
    {
        $date = new Date($hora);
        $hora = $date->format('h:i A');
        
            return $hora;
    }
    public function formato_crono($hora)
    {
        if($hora != null)
       { $date = new Date($hora);
        $hora = $date->format('i:s');}
        
            return $hora;
    }
    
    public function tiene_resultado_competicion($id_encuentro){
        $res = Encuentro_Seleccion::where('id_encuentro',$id_encuentro)->get()->last();
<<<<<<< HEAD
        if($res->posicion === NULL)
            return 0;
        else 
            return 1;
=======
        if (empty($res)) {
            return 1;
        }
        else {
            return 0;
        }
>>>>>>> refs/remotes/origin/master
    }
    public function es_futbol($id_enc){
        $nombre = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('disciplinas','club_participaciones.id_disc','disciplinas.id_disc')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->select('disciplinas.nombre_disc')->get()->last()->nombre_disc;
            if (str_contains(strtoupper($nombre), 'FUTBOL')) {
            //if($nombre.equalsIgnoreCase('futbol')){ 
                return 1;
            } else {
                return 0;
            }
    }
    public function es_basket($id_enc){
        $nombre = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('disciplinas','club_participaciones.id_disc','disciplinas.id_disc')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->select('disciplinas.nombre_disc')->get()->last()->nombre_disc;
            if (str_contains(strtoupper($nombre), 'BASKET')) {
            //if($nombre.equalsIgnoreCase('futbol')){ 
                return 1;
            } else {
                return 0;
            }
    }
    public function es_set($id_enc){
        $nombre = DB::table('encuentro_club_participaciones')
            ->join('club_participaciones','encuentro_club_participaciones.id_club_part','club_participaciones.id_club_part')
            ->join('disciplinas','club_participaciones.id_disc','disciplinas.id_disc')
            ->where('encuentro_club_participaciones.id_encuentro',$id_enc)
            ->select('disciplinas.*')->get();
            if (str_contains(strtoupper($nombre->last()->nombre_disc), 'VOLEIBOL') || str_contains(strtoupper($nombre->last()->nombre_disc), 'WALLY') || str_contains(strtoupper($nombre->last()->nombre_disc), 'RAQUETA')) {
            //if($nombre.equalsIgnoreCase('futbol')){
                if ($nombre->last()->tipo == 0) {
                    return 1;
                } else {
                    return 2;
                }
            } else {
                return 0;
            }
    }
    public function es_set_competicion($id_enc){
        $nombre = DB::table('encuentro_seleccions')
        ->join('selecciones','encuentro_seleccions.id_seleccion','selecciones.id_seleccion')
        ->join('club_participaciones','selecciones.id_club_part','club_participaciones.id_club_part')
        ->join('disciplinas','club_participaciones.id_disc','disciplinas.id_disc')
        ->where('encuentro_seleccions.id_encuentro',$id_enc)
        ->get();
            if (str_contains(strtoupper($nombre->last()->nombre_disc), 'TENIS') || str_contains(strtoupper($nombre->last()->nombre_disc), 'RAQUET') || str_contains(strtoupper($nombre->last()->nombre_disc), 'AJEDREZ')) {
            //if($nombre.equalsIgnoreCase('futbol')){
                if ($nombre->last()->tipo == 0) {
                    return 1;
                } else {
                    return 2;
                }
            } else {
                return 0;
            }
    }
}