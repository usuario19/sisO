<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    //
    protected $table = 'avisos';
	protected $primaryKey = 'id_aviso';

    protected $fillable = [
    	'titulo',
    	'id_administrador', 
    	'id_gestion', 
        'id_disc',
        'fecha_ini_aviso',
    	'fecha_fin_aviso',
        'imagen_aviso',
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
}
