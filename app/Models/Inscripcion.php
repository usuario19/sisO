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

	public function admin_club(){
		return $this->belongsTo('App\Models\Admin_Club','id_adminClub');

	}
	public function gestion(){
		return $this->belongsTo('App\Models\Gestion','id_gestion');
	}
	public function jugador_inscripciones(){
        return $this-hasMany('App\Models\Jugador_Inscripcion');
    }
}
