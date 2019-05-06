<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use App\Models\Participacion;
use App\Models\Inscripcion;
use App\Models\Ganador;
use App\Models\Club_participacion;
use Illuminate\Support\Facades\DB;



use Storage;

class Disciplina extends Model
{   protected $table = 'disciplinas';
	protected $primaryKey = 'id_disc';

    protected $fillable = [
		'nombre_disc',
        'categoria',
        'sub_categoria',
        'tipo',
		'foto_disc',
		'reglamento_disc',
		'descripcion_disc',
		/* 'id_disc', */
		//'futbol',
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
    public function avisos(){
        return $this->hasMany('App\Models\Aviso','id_disc');  
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
    public function nombre_subcateg($sub_categoria){
        switch ($sub_categoria) {
            case '0':
                return 'Senior';
                break;
            case '1':
                return 'Libre';
                break;
            case '2':
                return 'Senior - Libre';
            case '3':
                return 'Senior y/o Libre';
                break;
            case null:
                return '';
                break;   
        }
    }
    public function nombre_sub_categoria($sub_categoria){
        switch ($sub_categoria) {
            case '0':
                return 'Senior';
                break;
            case '1':
                return 'Libre';
                break;
            case '2':
                return 'Libre - Senior';
            case '3':
                return 'Libre y/o Senior';
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
    public function setNombreDiscAttribute($value)
    {
        if($value !== null)
            $this->attributes['nombre_disc']= trim(ucwords(strtolower($value)));
    }
    public function tiene_ganadores($id_disc, $id_gestion){
        $disciplina = Disciplina::find($id_disc);
        if ($disciplina->tipo==0) {
            $ganadores = DB::table('ganadors')
                ->join('participaciones','ganadors.id_participacion','participaciones.id_participacion')
                ->where('participaciones.id_gestion',$id_gestion)
                ->where('participaciones.id_disciplina',$id_disc)->get()->last();
            if (empty($ganadores)) {
                return 0;
            } else {
                return 1;
            }
        } else {
            $ganadores = DB::table('participante_ganadors')
                ->join('participaciones','participante_ganadors.id_participacion','participaciones.id_participacion')
                ->where('participaciones.id_gestion',$id_gestion)
                ->where('participaciones.id_disciplina',$id_disc)->get()->last();
            if (empty($ganadores)) {
                return 0;
            } else {
                return 1;
            }
        }
    }
    public function es_futbol($id_disc){
        $nombre = Disciplina::find($id_disc)->nombre_disc;
        if (str_contains(strtoupper($nombre), 'FUTBOL')) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function es_ajedrez($id_disc){
        $nombre = Disciplina::find($id_disc)->nombre_disc;
        if (str_contains(strtoupper($nombre), 'AJEDREZ')) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function es_basket($id_disc){
        $nombre = Disciplina::find($id_disc)->nombre_disc;
        if (str_contains(strtoupper($nombre), 'BASKET')) {
            return 1;
        } else {
            return 0;
        }
        
    }
    public function es_set($id_disc){
        $nombre = Disciplina::find($id_disc);
        if (str_contains(strtoupper($nombre->nombre_disc), 'VOLEIBOL') || str_contains(strtoupper($nombre->nombre_disc), 'WALLY')) {
            if ($nombre->tipo == 0) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
        
    }
    public function es_raquetaFronton($id_disc){
        $nombre = Disciplina::find($id_disc);
        if (str_contains(strtoupper($nombre->nombre_disc), 'TENIS') || str_contains(strtoupper($nombre->nombre_disc), 'RAQUETA') || str_contains(strtoupper($nombre->nombre_disc), 'RAQUET')) {
            if ($nombre->tipo == 0) {
                return 1;//EQUIPO
            } else {
                return 2;//SI ES INDIVIDUAL
            }
        } else {
            return 0;
        }
        
    }
}
