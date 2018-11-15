<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'id_grupo';
    protected $fillable = [
    	'id_grupo',
        'nombre_grupo',
        'id_fase'
    ];
    protected $hidden = ['remember_token'];

    public function fase(){
    	return $this->belongsTo('App\Models\Fase','id_fase');
    }
    
    public function grupo_seleccions(){
    	return $this->hasMany('App\Models\Grupo_seleccion');
    }

    public function grupo_club_particpaciones(){
    	return $this->hasMany('App\Models\Grupo_Club_participacion','id_grupo');
    }
}
