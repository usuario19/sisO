<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo_Club_Participacion extends Model
{
    //
    protected $table = 'grupo_club_participaciones';
	//protected $primaryKey = 'id_grupo_club_part';

    protected $fillable =['id_grupo', 'id_club_part'];

    public function grupo(){
         return $this->belongsTo('App\Models\Grupo','id_grupo');
    }

    public function club_participacion(){
    	 return $this->belongsTo('App\Models\Club_Participacion','id_club_part');
    }
}
