<?php

namespace App\Http\Requests;

use App\Rules\Alpha_num_spaces;
use Illuminate\Foundation\Http\FormRequest;

class GestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre_gestion'=>['required','between:2,150', new Alpha_num_spaces], 
            'sede' =>['required','between:2,150',  new Alpha_num_spaces], 
            /* 'estado_gestion' =>'required',
            'periodo_inscripcion' =>'required', */
            'disciplinas' =>'required',
            'fecha_inicio' =>['required','date'],
            'fecha_fin' =>['required','date'],
            'descripcion'=>'between:0,200',
        ];
    }
}
