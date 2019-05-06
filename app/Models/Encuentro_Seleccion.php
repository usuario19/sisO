<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro_Seleccion extends Model
{
    protected $table = 'encuentro_seleccions';
	protected $primaryKey = 'id_encuentro_seleccion';
    protected $fillable = [
        'posicion',
        'tiempo',
        'tr',
        'ta',
        'puntos_set1',
        'puntos_set2',
        'puntos_set3',
        'puntos_set4',
        'puntos_set5',
        'faltas',
        'puntos_tiempo_extra',
        'penales',
        'observacion',
        'id_encuentro',
        'id_seleccion',
        /* 'id_fase', */
    ];
    protected $hidden = ['remember_token'];
}
