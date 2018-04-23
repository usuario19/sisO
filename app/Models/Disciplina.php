<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //
    protected $fillable = [
		'nombre_disc',
		'reglamento_disc',
		'descripcion_disc',
		];

	protected $hidden = [
		'remember_token'
		];

	public function disciplina_getions()
	{
		return $this->hasMany('App\Models\disciplina_gestion');
	}
}
