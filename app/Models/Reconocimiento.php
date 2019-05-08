<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    //
    protected $table = 'reconocimientos';
	protected $primaryKey = 'id_reconocimiento';

    protected $fillable =['id_participacion', 'id_club','id_jugador'];

    public function participacion(){
    	return $this->belongsTo('App\Models\Participacion','id_participacion');
    } 
    public function club(){
    	return $this->belongsTo('App\Models\Club','id_club');
    }
    public function jugador(){
    	return $this->belongsTo('App\Models\Jugador','id_jugador');
    }
}
