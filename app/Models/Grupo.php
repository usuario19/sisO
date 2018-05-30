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
    ];
    protected $hidden = ['remember_token'];

    public function fases (){
    	return $this->belongsTo('App\Models\Fase');
    }
    public function grupo_seleccions(){
    	return $this->hasMany('App\Models\Grupo_seleccion');
    }
}
