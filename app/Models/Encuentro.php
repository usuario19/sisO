<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jugador;
use App\Models\Jugador_Club;
use App\Models\Seleccion;
use App\Models\Fecha;
use App\Models\Fecha_Grupo;
use App\Models\Encuentro;
use App\Models\Encuentro_Club_Participacion;
use App\Models\Club_Participacion;
use App\Models\Encuentro_Seleccion;
use Illuminate\Support\Facades\DB;
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
    
    public function fecha(){
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
            ->where('encuentro_seleccions.id_encuentro','=',$id_encuentro)
            //->where('club_participaciones.id_disc',$id_disc)
            ->select('jugadores.*')->get();
        
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
        $res = Encuentro_Club_participacion::where('id_encuentro',$id_encuentro)->get()->last();
        if ($res->resultado == null) {
            return 0;
        }
        else {
            return 1;
        }
    }
}