<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fechas';
	protected $primaryKey = 'id_fecha';

	
    protected $fillable = [
        'nombre_fecha', 
        'id_fase',
    ];
    protected $hidden = [
        'remember_token',
    ];
    public function fase(){
    	return $this->belongsTo('App\Models\Fase','id_fase');
    }
    public function encuentros(){
    	return $this->hasMany('App\Models\Encuentro','id_fecha');
    }
}