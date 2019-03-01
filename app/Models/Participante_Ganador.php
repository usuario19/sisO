<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante_Ganador extends Model
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