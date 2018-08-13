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
    ];
    protected $hidden = ['remember_token'];
    
    public function encuentro_club_participaciones(){
    	return $this->hasMany('App\Models\Encuentro_Club_participaciones','id_encuentro_club_part');
    }
    public function fecha(){
    	return $this->belongsTo('App\Models\Fecha','id_fecha','id_fecha');
    }
}