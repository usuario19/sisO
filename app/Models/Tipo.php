<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre_tipo'];
    protected $hidden = ['remember_token'];

    public function fase_tipos(){
    	return $this->hasMany('App\Models\Fase_Tipo','id_tipo','id_tipo');
    }
}
