<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eliminacion_Competencia extends Model
{
    protected $table = 'eliminacion_competencias';
	protected $primaryKey = 'id_eliminacion';
    protected $fillable =['id_fase', 'id_club_part'];
}
