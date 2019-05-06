<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha_Grupo extends Model
{
    protected $table = 'fechas_grupos';
    
    protected $fillable = [
        'if_fecha',
        'id_grupo',
    ];
    protected $hidden = ['remember_token'];

    public function fecha(){
    	return $this->belongsTo('App\Models\Fecha','id_fecha');
    }
    public function grupo(){
    	return $this->belongsTo('App\Models\Grupo','id_grupo');
    }
}