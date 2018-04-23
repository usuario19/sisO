<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class disciplina_gestion extends Model
{
    protected $fillable =['id_gest', 'id_disc'];

    public function disciplina(){
    	 return $this->belongsTo('App\Models\Disciplina','id_disc');
    }

     public function gestion(){
    	 return $this->belongsTo('App\Models\Gestion','id_gestion');
    }
}
