<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador_Inscripcion extends Model
{
    //
    protected $table = 'Jugador_Inscripciones';

	
    protected $fillable = [
    	'id_inscripcion',
    	'id_jugador',

    ];



    protected $hidden = [
        'remember_token',
    ];
}
