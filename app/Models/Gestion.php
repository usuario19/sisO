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
		'estado_gestion',
		'periodo_inscripcion',
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
    public function avisos(){
        return $this->hasMany('App\Models\Aviso','id_gestion');  
    }
	public function setSedeAttribute($value)
    {
        if($value !== null)
            $this->attributes['sede']= trim(ucwords(strtolower($value)));
    }

    public function setNombreGestionAttribute($value)
    {
        if($value !== null)
            $this->attributes['nombre_gestion']= trim(ucwords(strtolower($value)));
    }
    // public function ver_estado_gestion($estado_gestion){
    //     if ($estado_gestion = 1) {
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }
}
