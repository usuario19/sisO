<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Administrador;

class AdministradorRequest extends FormRequest
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
            'ci'=>'required|unique:administradores|numeric',
            'nombre'=>'required|alpha|min:3|max:100', 
            'apellidos' =>'required|alpha|min:4|max:150', 
            'genero' =>'required',
            'fecha_nac' =>'required|date',
            'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            'descripcion_admin'=>'required|max:200',
            'email'=>'required|unique:administradores|email',
            'password'=>'required|confirmed|min:6|max:100',
        ];
    }
}
