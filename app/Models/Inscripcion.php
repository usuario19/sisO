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
		'id_adminClub',
		];
	protected $hidden = [
		'remember_token'
		];

	public function admin_clubs(){
		return $this->belongTo('App\Models\Admin_Club','id_adminClub');
	}
	public function gestions(){
		return $this->belongTo('App\Models\Gestion','id_gestion');
	}
}
