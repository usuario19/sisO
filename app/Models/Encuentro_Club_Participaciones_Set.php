<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro_Club_Participaciones_Set extends Model
{
    //
    protected $table = 'encuentro_club_participaciones_sets';
	protected $primaryKey = 'id_encuentro_club_part_set';
    protected $fillable = [
        'id_encuentro',
        'id_fase',
        'id_club_part',
    	'puntos', 
    	'set_ganados', 
    	'set_jugados', 
    	'observacion',
        'puntos_set1',
        'puntos_set2',
        'puntos_set3',
        'puntos_set4',
        'puntos_set5',
        
    	
    ];
    protected $hidden = ['remember_token'];
    
    public function encuentro(){
    	return $this->belongTo('App\Models\Encuentro','id_encuentro');
    }
    public function fase(){
    	return $this->belongTo('App\Models\Fase','id_fase');
    }
    public function club_participacion(){
    	return $this->belongsTo('App\Models\Club_Participacion','id_club_part');
    }
}
