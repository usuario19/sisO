<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Alpha_num_spaces;


class DisciplinaRequest extends FormRequest
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
            'nombre_disc'=>['required','between:2,150', new Alpha_num_spaces],
            'foto_disc' =>'image|mimes:jpeg,jpg,png,gif|max:5120',//5mb
            'categoria'=>'required',
            'tipo'=>'required',
            'reglamento_disc'=>'file|mimes:pdf|max:5120',
            'descripcion_disc'=>'between:0,200',
        ];
    }
}
