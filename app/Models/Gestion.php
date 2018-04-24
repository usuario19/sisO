<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    //
    protected $table = 'gestiones';
	protected $primaryKey = 'id_gestion';

    protected $fillable = [
		'nombre_gestion',
		'fecha_ini',
		'fecha_fin',
		'descripcion_gestion',
		];
	protected $hidden = [
		'remember_token'
		];
		
	public function disciplina_gestions()
	{
		return $this-hasMany('App\Models\disciplina_gestion');
	}
}
