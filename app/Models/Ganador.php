<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    protected $table = 'ganadors';
	protected $primaryKey = 'id_ganador';
    protected $fillable = [
    	'posicion_ganador', 
    	'id_club',
    	'id_participacion',
    ];
    protected $hidden = ['remember_token'];
}
