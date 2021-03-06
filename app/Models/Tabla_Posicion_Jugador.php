<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabla_Posicion_Jugador extends Model
{
    protected $table = 'tabla_posicion_jugadors';
	protected $primaryKey = 'id_tabla_posicion_jugador';
    protected $fillable = [
        'id_seleccion',
        'id_disc',
        'id_fase',
        'cantidad_encuentros',
        'tiempo_total',
        'posicion',
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
    ];
    protected $hidden = ['remember_token'];

    public function selecciones(){
        return $this->hasMany('App\Models\Seleccion','id_seleccion');
    }
}
