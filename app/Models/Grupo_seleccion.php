<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo_Seleccion extends Model
{
    protected $table = 'grupo_seleccions';
    protected $fillable = [
    	'id_grupo',
    	'id_seleccion',
    ];
    protected $hidden = ['remember_token'];
    public function grupo(){
    	return $this->belongsTo('App\Models\Grupo');
    }
    public function seleccion(){
    	return $this->belongsTo('App\Models\Seleccion');
    }
}
