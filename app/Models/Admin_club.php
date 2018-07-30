<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_Club extends Model
{
    //
    protected $table = 'adminclubs';
    protected $primaryKey = 'id_adminClub';
    protected $fillable = [
    	'id_administrador',
    	'id_club',
        'estado_coordinador',
    ];

    protected $hidden = [
        'remember_token',
    ];


    public function administrador(){
         return $this->belongsTo('App\Models\Administrador','id_administrador');
    }

     public function club(){
         return $this->belongsTo('App\Models\Club','id_club');
    }
    
    public function inscripciones(){
        return $this->hasMany('App\Models\Inscripcion','id_adminClub');
    }
}
