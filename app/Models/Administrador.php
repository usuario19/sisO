<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

use Storage;


class Administrador extends Model
{
	protected $table = 'administradores';
	protected $primaryKey = 'id_administrador';

	
    protected $fillable = [
    	'ci',
    	'nombre', 
    	'apellidos', 
    	'genero',
    	'fecha_nac',
    	'foto_admin',
    	'descripcion_admin',
    	'email',
    	'password',

    ];



    protected $hidden = [
        'password', 'remember_token',
    ];

    //un jugador administra a un club
    public function admin_clubs(){
        return $this-hasMany('App\Models\Admin_club');
    } 

    //ALMACENAR LA IMAGEN EN LA CARPETA
    public function setFotoAdminAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('fotos')->put($nombre, file_get_contents($value));

            $this->attributes['foto_admin'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
}
