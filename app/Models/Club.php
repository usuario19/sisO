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

	public function admin_clubs(){

		return $this->hasMany('App\Models\Admin_Club','id_adminClub','id_adminClub');

        
	}
    /**public function inscripcions(){
        return $this->hasMany('App\Models\Inscripcion','id_club');
    }**/
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
