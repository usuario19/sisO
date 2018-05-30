<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fase_Tipo extends Model
{
    protected $table = 'fase_tipos';
    protected $fillable = ['id_fase','id_tipo'];
    protected $hidden = ['remember_token'];

    public function fases(){
    	return $this->belongsTo('App\Models\Fase','id_fase','id_fase');
    }
    public function tipos(){
    	return $this->belongsTo('App\Models\Tipo','id_tipo','id_tipo');
    }   
}