<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro';

    protected $fillable = [
		'nombre_centro',
		'ubicacion_centro',
		];

	protected $hidden = [
		'remember_token'
		];
}
