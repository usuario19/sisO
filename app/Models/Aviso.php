<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Aviso extends Model
{
    //
    protected $table = 'avisos';
	protected $primaryKey = 'id_aviso';

    protected $fillable = [
    	'titulo',
    	'id_administrador', 
    	/* 'id_gestion', 
        'id_disc', */
        'fecha_ini_aviso',
        'fecha_fin_aviso',
        'hora_publicacion',
    	'contenido',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function gestion(){
        return $this->belongsTo('App\Models\Gestion','id_gestion');
    }

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina','id_disc');
    }

    public function administrador(){
        return $this->belongsTo('App\Models\Administrador','id_administrador');
   }

   public function fecha_hora_publicacion($fecha,$hora){

    $date = new Date($fecha."".$hora);
    $fecha_hora = $date->format('l j F Y g:i a');
    return $fecha_hora;
    }
}
