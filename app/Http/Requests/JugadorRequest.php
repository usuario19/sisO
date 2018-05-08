<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nombre_jugador'=>'required|alpha|min:3|max:100', 
            'apellidos_jugador' =>'required|alpha|min:4|max:150', 
            'genero_jugador' =>'required',
            'fecha_nac_jugador' =>'required|date',
            'foto_jugador' =>'mimes:jpeg,bmp,png,jpg|max:5120',//5mb
            'descripcion_jugador'=>'required|max:200',
            'email_jugador'=>'required|unique:jugadores|email',
            //'password'=>'required|confirmed|min:6|max:100|alpha_num',
        ];
    }
}
