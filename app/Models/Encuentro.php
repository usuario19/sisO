<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jugador;
use App\Models\Jugador_Club;
use App\Models\Seleccion;
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
}