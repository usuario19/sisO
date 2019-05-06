<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Alpha_num_spaces;

class AvisoRequest extends FormRequest
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
            /* 'nombre_centro'=>['required','between:2,150', new Alpha_num_spaces],
            'ubicacion_centro'=>'required|url',
            'descripcion_centro'=>'between:0,200', */
            'titulo'=>['required','between:2,150', new Alpha_num_spaces],
            'fecha_ini_aviso'=>'required|date',
            'fecha_ini_fin'=>'date',
            'contenido'=>'required',
        ];
    }
}
