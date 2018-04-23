<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $fillable = [
    	'nombre_permiso',
    ];



    protected $hidden = [
        'remember_token',
    ];
    public function usuarios(){
        return $this-belongsToMany('App\Models\Usuario');
    }
    

}