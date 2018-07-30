<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Club extends Model
{
    protected $table = 'clubs';
    protected $primaryKey = 'id_club';

    protected $fillable = [
		'nombre_club',
		'ciudad',
		'logo',
		'descripcion_club',
		];

	protected $hidden = [
		'remember_token'
		];
    //UN CLUB TIENE VARION JUGADORES
    public function jugador_clubs(){
        return $this->hasMany('App\Models\Jugador_Club', 'id_club');
        
    }
    //UN CLUB TIENE MUCHOS ADMINISTRADORES
	public function admin_clubs(){

		return $this->hasMany('App\Models\Admin_Club','id_adminClub');  
	}
    //
    public function club_participaciones(){

        return $this->hasMany('App\Models\Club_Participacion','id_club');  
    }
    //
    public function inscripciones(){
        return $this->hasMany('App\Models\Inscripcion','id_adminClub');
    }
    //ALMACEN LOGO EN CARPETA

	public function setLogoAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('logos')->put($nombre, file_get_contents($value));
            $this->attributes['logo'] = $nombre;
        }
    }
}
