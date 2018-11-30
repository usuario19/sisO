<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fecha_Grupo extends Model
{
    protected $table = 'fechas_grupos';
    
    protected $fillable = [
        'if_fecha',
        'id_grupo',
    ];
    protected $hidden = ['remember_token'];
}