<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club_Participacion extends Model
{
    //
    protected $table = 'club_participaciones';

	
    protected $fillable = [
    	'id_participacion',
    	'id_club',

    ];



    protected $hidden = [
        'remember_token',
    ];
}
