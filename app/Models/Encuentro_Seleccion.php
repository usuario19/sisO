<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro_Seleccion extends Model
{
    protected $table = 'encuentro_seleccions';
	//protected $primaryKey = 'id_encuentro_club_part';
    protected $fillable = [
        'id_encuentro',
        'id_seleccion'
    ];
    protected $hidden = ['remember_token'];
}
