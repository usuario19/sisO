<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

use Storage;

class Disciplina extends Model
{
    //

    protected $table = 'disciplinas';
	protected $primaryKey = 'id_disc';

    protected $fillable = [
		'nombre_disc',
		'foto_disc',
		'reglamento_disc',
		'descripcion_disc',
		];

	protected $hidden = [
		'remember_token'
		];

	public function disciplina_getions()
	{
		return $this->hasMany('App\Models\disciplina_gestion');
	}
	public function setFotoDiscAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('fotos')->put($nombre, file_get_contents($value));
            $this->attributes['foto_disc'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
}
