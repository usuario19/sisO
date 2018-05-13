<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase_Tipo extends Model
{
    protected $table = 'fase_tipos';
    protected $fillable = ['id_fase','id_tipo'];
    protected $hidden = ['remember_token'];

    public function fase_tipos(){
    	retunr $this->hasMany('App\Models\Fase_Tipo');
    }
}