<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fechas';
	protected $primaryKey = 'id_fecha';

	
    protected $fillable = [
    	'nombre_fecha', 
    ];
    protected $hidden = [
        'remember_token',
    ];
    public function fase(){
    	return $this->belongsTo('App\Models\Fase');
    }
    public function encuentros(){
    	return $this->hasMany('App\Models\Encuentro','id_fecha');
    }
}