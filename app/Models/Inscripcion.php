<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    //
    protected $table = 'inscripciones';
	protected $primaryKey = 'id_inscripcion';

    protected $fillable = [
		'id_gestion',
		'id_club',
		];
	protected $hidden = [
		'remember_token'
		];
		
	public function clubs(){
		return $this->belongsTo('App\Models\Club','id_club');
	}
	public function gestiones(){
		return $this->belongsTo('App\Models\Gestion','id_gestion');
	}
	public function jugador_inscripciones(){
        return $this-hasMany('App\Models\Jugador_Inscripcion');
    }
}
