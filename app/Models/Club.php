<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use App\Models\Encuentro;
use App\Models\Encuentro_Club_Participacion;
use App\Models\Club_Participacion;
use App\Models\Fecha;
use App\Models\Fase;

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
    public function pj($id_club,$id_fase){
        $pj = DB::table('clubs')
        ->join('club_participaciones','clubs.id_club','=','club_participaciones.id_club')
        ->join('encuentro_club_participaciones','club_participaciones.id_club_part','=','encuentro_club_participaciones.id_club_part')
        ->join('encuentros','encuentro_club_participaciones.id_encuentro','=','encuentros.id_encuentro')
        ->join('fechas','encuentros.id_fecha','=','fechas.id_fecha')
        ->join('fases','fechas.id_fase','=','fases.id_fase')
        ->join('participaciones','fases.id_participacion','=','participaciones.id_participacion')
        ->select('encuentro_club_participaciones.puntos as puntos', 'clubs.*')
        ->where('fases.id_fase','=',$id_fase)
        ->where('clubs.id_club','=',$id_club)
        //->groupBy('clubs.id_club')
        //->distinct('id_clubs')
        ->count();
        return $pj;
    }
}
