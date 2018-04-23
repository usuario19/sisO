<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Club extends Model
{
    //
    protected $fillable = [
		'nombre_club',
		'id_coordinador',
		'ciudad',
		'logo',
		'descripcion_club',
		];

	protected $hidden = [
		'remember_token'
		];

	public function disciplinas(){
		return $this->belongsToMany('App\Models\Disciplina');
	}

	//club tiene muchos jugadores
	public function usuarios(){
		return $this->hasMany('App\Models\Usuario');
	}
	public function setLogoAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('logos')->put($nombre, file_get_contents($value));
            $this->attributes['logo'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
}
