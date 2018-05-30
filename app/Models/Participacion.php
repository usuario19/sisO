<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
	protected $table = 'participaciones';
	protected $primaryKey = 'id_participacion';

    protected $fillable =['id_gestion', 'id_disciplina'];

    public function disciplina(){
    	 return $this->belongsTo('App\Models\Disciplina','id_disciplina');
    }

    public function gestion(){
    	 return $this->belongsTo('App\Models\Gestion','id_gestion');
    }
    
    public function club_participaciones(){

        return $this->hasMany('App\Models\Club_Participacion','id_participacion');  
    }
}
