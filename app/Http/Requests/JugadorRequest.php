<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Alpha_spaces;
use App\Rules\birthdate;

class JugadorRequest extends FormRequest
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
            'ci_jugador'=>'required|unique:jugadores|numeric',
            'nombre_jugador'=>['required','between:2,150', new Alpha_spaces],
            'apellidos_jugador' =>['required','between:2,150', new Alpha_spaces],
            'genero_jugador' =>'required',
            'fecha_nac_jugador' =>['required','date', new birthdate],
            'foto_jugador' =>'mimes:jpeg,png,gif,jpg|max:5120',//5mb
            'descripcion_jugador'=>'between:0,200',
            'email_jugador'=>'required|unique:jugadores|email',
            //'password'=>'required|confirmed|min:6|max:100|alpha_num',
        ];
    }
}
