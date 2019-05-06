<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seleccion_Eliminacion extends Model
{
    protected $table = 'seleccion_eliminacions';
	protected $primaryKey = 'id_sel_eliminacion';
    protected $fillable =['id_fase', 'id_seleccion'];

    public function fases(){
         return $this->belongsTo('App\Models\Fase','id_fase');
    }

    public function selecciones(){
    	 return $this->belongsTo('App\Models\Seleccion','id_seleccion');
    }
}
