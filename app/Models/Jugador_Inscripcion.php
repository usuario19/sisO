<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador_Inscripcion extends Model
{
    //
    protected $table = 'jugador_inscripciones';

    protected $primaryKey = 'id_insc_jug';
    protected $fillable = [
    	'id_inscripcion',
    	'id_jugador',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function jugador(){
         return $this->belongsTo('App\Models\Jugador','id_jugador');
    }

     public function inscripcion(){
         return $this->belongsTo('App\Models\Inscripcion','id_inscripcion');
    }
}
