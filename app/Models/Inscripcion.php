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
		return $this->belongTo('App\Models\Club','id_club');
	}
	public function gestions(){
		return $this->belongTo('App\Models\Gestion','id_gestion');
	}
}
