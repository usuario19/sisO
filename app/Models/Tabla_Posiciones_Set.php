<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabla_Posiciones_Set extends Model
{
    //
    protected $table = 'tabla_posiciones_sets';
	protected $primaryKey = 'id_tabla_posiciones_set';
    protected $fillable = [
    	'pj', 
    	'pg',
    	'pp',
    	'pe',
    	'sf',
    	'sc',
    	'ds',
    	'pf',
        'pe',
    	'dp',
        'puntos',
    	'id_club_part',
    	'id_fase',
    ];
	protected $hidden = ['remember_token'];
	public function club_participacion(){
		return $this->belongsTo('App\Models\Club_Participacion','id_club_part');
   }
}
