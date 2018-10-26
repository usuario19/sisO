<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eliminacion extends Model
{
    //
    protected $table = 'eliminaciones';
	protected $primaryKey = 'id_eliminacion';
    protected $fillable =['id_fase', 'id_club_part'];

    public function fases(){
         return $this->belongsTo('App\Models\Fase','id_fase');
    }

    public function club_participaciones(){
    	 return $this->belongsTo('App\Models\Club_Participacion','id_club_part');
    }
}
