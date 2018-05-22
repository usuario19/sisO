<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador_Club extends Model
{
    //
    protected $table = 'jugador_clubs';
    protected $fillable = [
    	'id_club',
        'id_jugador',
    ];

    protected $hidden = [
        'remember_token',
    ];
    //UNA SUSCRIPCION  LE PRETENECE A UN JUGADOR
    public function jugador(){
         return $this->belongsTo('App\Models\Jugador','id_jugador');
    }
    //UNA SUSCRIPCION LE PRETENECE A UN CLUB
    public function club(){
         return $this->belongsTo('App\Models\Club','id_club');
    }
}
