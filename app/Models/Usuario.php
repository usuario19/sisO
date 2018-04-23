<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

use Storage;

class Usuario extends Model
{
    //
    protected $fillable = [
    	'ci',
    	'nombre', 
    	'apellidos', 
    	'genero',
    	'fecha_nac',
    	'foto',
    	'email',
    	'descripcion_usuario',
    	'password',
    	'id_club',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];
    public function permisos (){
        return $this-belongsToMany('App\Models\Permiso');
    }
    //un jugador pertenece a un club
    public function club (){
        return $this-belongsTo('App\Models\Club');
    } 
    //ALMACENAR EL LIBRO EN LA CARPETA
    public function setFotoAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
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
