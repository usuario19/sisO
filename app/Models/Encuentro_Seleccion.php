<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuentro_Seleccion extends Model
{
    //revisarrrrrr no esta bien gggggg
    protected $table = 'adminclubs';
    protected $fillable = [
    	'id_administrador',
    	'id_club',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function administradors(){
         return $this->belongsTo('App\Models\Administrador','id_administrador');
    }

     public function clubs(){
         return $this->belongsTo('App\Models\Club','id_club');
    }
}
