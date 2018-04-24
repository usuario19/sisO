<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

use Storage;

class Jugador extends Model
{
    //
    protected $table = 'jugadores';
    protected $primaryKey = 'id_jugador';

    protected $fillable = [
    	'ci_jugador',
    	'nombre_jugador', 
    	'apellidos_jugador', 
    	'genero_jugador',
    	'fecha_nac_jugador',
    	'foto_jugador',
    	'email_jugador',
    	'descripcion_jugador',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];
   
    //un jugador pertenece a un club
    public function club (){
        return $this-belongsTo('App\Models\Club');
    } 
    //ALMACENAR EL LIBRO EN LA CARPETA
    public function setFotoJugadorAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('fotos')->put($nombre, file_get_contents($value));
            $this->attributes['foto_jugador'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
}
