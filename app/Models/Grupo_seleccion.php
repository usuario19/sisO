<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_seleccion extends Model
{
    protected $table = 'gruposeleccion';

    protected $fillable = [
    	'id_grupo',
    	'id_seleccion',
    ];
    protected $hidden = ['remember_token'];

    public function grupos(){
    	return $this->hasMany('App\Models\Grupo');
    }
    public function seleccions(){
    	return $this->hasMany('App\Models\Seleccion');
    }
}
