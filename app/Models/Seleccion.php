<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seleccion extends Model
{
    //
    protected $table = 'selecciones';
	protected $primaryKey = 'id_seleccion';

    protected $fillable =['id_jug_club', 'id_club_part'];

    public function jugador_club(){
    	 return $this->belongsTo('App\Models\Jugador_Club','id_jug_club');
    }

    public function club_participacion(){
        return $this->belongsTo('App\Models\Club_Participacion','id_club_part');  
    }
    public function tabla_posicion_jugador(){
        return $this->belongsTo('App\Models\Tabla_Posicion_Jugador','id_seleccion');  
    }
    public function seleccion_eliminacions (){
    	return $this->hasMany('App\Models\Seleccion_Eliminacion','id_seleccion');
    }
    public function grupo_seleccions(){
    	return $this->hasMany('App\Models\Grupo_seleccion');
    }
    
}
