<?php

namespace App;

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
    public function fases(){
    	return $this->belongTo('App\Models\Fase')
    }
    public function encuentros(){
    	return $this->hasMany('App\Models\Encuentro')
    }
}