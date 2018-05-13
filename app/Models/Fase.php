<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';
    protected $primaryKey = 'id_fase';
    protected $fillable = ['nombre_fase'];
    protected $hidden = ['remember_token'];

    public function fase_tipos (){
    	return $this->hasMany('App\Models\Fase_Tipo');
    }
    public function fechas(){
    	return $this->hasMany('App\Models\Fecha');
    }
}