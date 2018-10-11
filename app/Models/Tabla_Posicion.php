<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabla_Posicion extends Model
{
    protected $table = 'tabla_posicions';
	protected $primaryKey = 'id_tabla_posicion';
    protected $fillable = [
    	'pj', 
    	'pg',
    	'pp',
    	'pe',
        'puntos',
    	'id_club',
    	'id_fase',
    ];
	protected $hidden = ['remember_token'];
	public function club(){
		return $this->belongsTo('App\Models\Club','id_club');
   }
}
