<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Participacion;


class Gestion extends Model
{
    //
    protected $table = 'gestiones';
	protected $primaryKey = 'id_gestion';

    protected $fillable = [
		'nombre_gestion',
		'fecha_ini',
		'fecha_fin',
		'sede',
		'descripcion_gestion',
		];
	protected $hidden = [
		'remember_token'
		];
	
	public function inscripciones(){
        return $this->hasMany('App\Models\Inscripcion','id_gestion');
    }

    public function participaciones(){
        return $this->hasMany('App\Models\Participacion','id_gestion');
    }
	public function club_participaciones(){

        return $this->hasMany('App\Models\Club_Participacion','id_gestion');  
    }
	
}
