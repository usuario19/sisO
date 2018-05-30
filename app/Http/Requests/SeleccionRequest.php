<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeleccionRequest extends FormRequest
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
            'id_club_part'=>'required',
            'id_jug_club'=>'required',
        ];
    }
    public function messages()
    {
        return [
        //'id_club_part.required' => 'A title is required',
        'id_jug_club.required'  => 'Debe seleccionar por lo menos un jugador.',
        ];
    }
}
