<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestion;
use App\Models\Disciplina;


class Participacion extends Model
{
	protected $table = 'participaciones';
	protected $primaryKey = 'id_participacion';

    protected $fillable =['id_gestion', 'id_disciplina'];

    public function gestiones(){
         return $this->belongsTo('App\Models\Gestion','id_gestion');
    }
    public function disciplina(){
    	 return $this->belongsTo('App\Models\Disciplina','id_disciplina', 'id_disc');
    }  
    public function club_participaciones(){

        return $this->hasMany('App\Models\Club_Participacion','id_participacion');  
    }
    public function fases(){
        return $this->hasMany('App\Models\Fase','id_participacion');
    } 
}
