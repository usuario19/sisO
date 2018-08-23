<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    protected $table = 'encuentros';
	protected $primaryKey = 'id_encuentro';
    protected $fillable = [
    	'fecha', 
    	'hora',
    	'ubicacion',
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
}