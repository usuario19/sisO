<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Alpha_spaces;

class ClubRequest extends FormRequest
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
            'nombre_club'=>['unique:clubs','required','between:2,150', new Alpha_spaces],
            'logo' =>'image|mimes:jpeg,jpg,png,gif|max:5120',//5mb
            'descripcion_club'=>'between:0,200',
        ];
    }
}
