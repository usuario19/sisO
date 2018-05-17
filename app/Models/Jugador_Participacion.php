<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador_Participacion extends Model
{
    //
    protected $table = 'Jugador_participaciones';

	
    protected $fillable = [
    	'id_jugador',
    	'id_participacion',

    ];



    protected $hidden = [
        'remember_token',
    ];
}
