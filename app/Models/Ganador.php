<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Club;


class Ganador extends Model
{
    protected $table = 'ganadors';
	protected $primaryKey = 'id_ganador';
    protected $fillable = [
    	'posicion_ganador', 
    	'id_club',
    	'id_participacion',
    ];
    protected $hidden = ['remember_token'];
    
   /*  public function participacion(){
    	return $this->hasMany('App\Models\Participacion','id_participacion');
    } */
    public function participacion(){
    	return $this->belongsTo('App\Models\Participacion','id_participacion');
    } 
    public function club(){
    	return $this->belongsTo('App\Models\Club','id_club');
    } 
    /* public function clubs(){
    	return $this->hasMany('App\Models\Club','id_club');
    }  */
}
