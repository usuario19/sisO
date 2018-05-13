<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre_tipo'];
    protected $hidden = ['remember_token'];

    public function fase_tipos(){
    	retunr $this->hasMany('App\Models\Fase_Tipo');
    }
}
