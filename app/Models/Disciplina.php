<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Models\Participacion;
use App\Models\Inscripcion;
use App\Models\Club_participacion;


use Storage;

class Disciplina extends Model
{   protected $table = 'disciplinas';
	protected $primaryKey = 'id_disc';

    protected $fillable = [
		'nombre_disc',
        'categoria',
        'tipo',
		'foto_disc',
		'reglamento_disc',
		'descripcion_disc',
		'id_disc',
		];

	protected $hidden = [
		'remember_token'
		];

    public function participaciones(){
        return $this->hasMany('App\Models\Participacion','id_disc','id_disciplina');
    }    
    public function inscripcions(){
        return $this->hasMany('App\Models\Inscripcion','id_disc');
    }
    public function club_participaciones(){
        return $this->hasMany('App\Models\Club_Participacion','id_disc');  
    }



    //......................................................................
	public function setFotoDiscAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('foto_disc')->put($nombre, file_get_contents($value));
            $this->attributes['foto_disc'] = $nombre;
            /*
            $path = storage_path('app/public');
            $value ->move($path, $nombre);
            $this->attributes['archivo'] = 'app/public/'.$nombre;*/
        }
    }
    public function setReglamentoDiscAttribute($value)
    {
        if($value !== null)
        {
            $nombre = time().'-'.$value->getClientOriginalName();
            //obtiene eel nombre del archivo
            Storage::disk('archivos')->put($nombre, file_get_contents($value));
            $this->attributes['reglamento_disc'] = $nombre;
        }
    }
    public function nombre_categoria($categoria){
        switch ($categoria) {
            case '0':
                return 'Mixto';
                break;
            case '1':
                return 'Damas';
                break;
            case '2':
                return 'Varones';
                break;   
        }
    }
    public function nombre_tipo($tipo){
        switch ($tipo) {
            case '0':
                return 'Equipo';
                break;
            case '1':
                return 'Competicion';
                break;   
        }
    }
}
