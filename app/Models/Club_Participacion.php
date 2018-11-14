<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club_Participacion extends Model{

    protected $table = 'club_participaciones';
	protected $primaryKey = 'id_club_part';

    protected $fillable =['id_gestion', 'id_club','id_disc'];

    public function disciplina(){
         return $this->belongsTo('App\Models\Disciplina','id_disc');
    }

    public function gestiones(){
    	 return $this->belongsTo('App\Models\Gestion','id_gestion');
    }

    public function club(){
    	 return $this->belongsTo('App\Models\Club','id_club');
    }

    public function selecciones(){
         return $this->hasMany('App\Models\Seleccion','id_club_part');
    }

    public function grupo_club_participaciones(){
        return $this->hasMany('App\Models\Grupo_Club_Participacion','id_club_part');
   }
    public function encuentro_club_participaciones(){
         return $this->hasMany('App\Models\Encuentro_Club_Participacion','id_club_part');
    }
}
