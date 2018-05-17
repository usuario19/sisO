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
