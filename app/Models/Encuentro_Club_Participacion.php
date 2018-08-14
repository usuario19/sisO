<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro_Club_Participacion extends Model
{
    protected $table = 'encuentro_club_participaciones';
	protected $primaryKey = 'id_encuentro_club_part';
    protected $fillable = [
        'id_encuentro',
        'id_club_part',
    	'puntos', 
    	'observacion',
        'resultado',
        
    	
    ];
    protected $hidden = ['remember_token'];
    
    public function encuentro(){
    	return $this->belongTo('App\Models\Encuentro','id_encuentro');
    }
    public function club_participacion(){
    	return $this->belongsTo('App\Models\Club_Participacion','id_club_part');
    }
}