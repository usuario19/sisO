<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';
    protected $primaryKey = 'id_fase';
    protected $fillable = [
        'nombre_fase',
        'id_participacion',
        //'id_fecha'
    ];
    protected $hidden = ['remember_token'];

    public function fase_tipos (){
    	return $this->hasMany('App\Models\Fase_Tipo');
    }
    public function fechas(){
    	return $this->hasMany('App\Models\Fecha','id_fecha');
    }
    public function participacion(){
        return $this->belongsTo('App\Models\Participacion','id_participacion');
   } 
   public function grupos(){
    return $this->hasMany('App\Models\Grupo', 'id_fase');
}
}