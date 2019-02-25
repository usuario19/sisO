<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Paricipante_Ganador extends Model
{
    protected $table = 'participante_ganadors';
	protected $primaryKey = 'id_participante_ganador';
    protected $fillable = [
    	'posicion_participante', 
    	'id_jugador',
    	'id_participacion',
    ];
    protected $hidden = ['remember_token'];
}
