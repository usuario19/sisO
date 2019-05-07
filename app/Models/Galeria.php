<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Galeria extends Model
{
    protected $table = 'galerias';
	protected $primaryKey = 'id_galeria';

    protected $fillable = [
    	'titulo',
    	'id_gestion', 
        'id_disc',
        'foto',
        'fecha_publicacion',
    	'comentario',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function gestion(){
        return $this->belongsTo('App\Models\Gestion','id_gestion');
    }

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina','id_disc');
    }
    public function setFotoAttribute($value)
    {
        if($value !== null)
        {
            //$nombre = time().'-'.'image.'.$value->getClientOriginalExtension();
            $nombre = time().'-'.'image.'.$value->guessClientExtension();
            //obtiene eel nombre del archivo
            Storage::disk('fotos')->put($nombre, file_get_contents($value));

            $this->attributes['foto'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
}
