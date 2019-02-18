<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabla_Posicion_Jugador extends Model
{
    protected $table = 'tabla_posicion_jugadors';
	protected $primaryKey = 'id_tabla_posicion_jugador';
    protected $fillable = [
        'id_seleccion',
        'id_fase',
        'id_disc'
    ];
    protected $hidden = ['remember_token'];
}
