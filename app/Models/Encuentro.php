<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    protected $table = 'encuentros';
	protected $primaryKey = 'id_encuentro';
    protected $fillable = [
    	'nombre_encuentro', 
    	'fecha', 
    	'hora',
    	'ubicacion',
    	'observacion',
    	'resultado',
    ];
    protected $hidden = ['remember_token'];
    public function encuentro_seleccions(){
    	return $this->hasMany('App\Models\Encuentro_Seleccion');
    }
    public function fecha(){
    	return $this->belongsTo('App\Models\Fecha','id_fecha');
    }
}