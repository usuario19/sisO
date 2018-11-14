<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Administrador;
use App\Rules\Alpha_spaces;
use App\Rules\password;
use App\Rules\birthdate;


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
            'ci'=>'required|unique:administradores|numeric|digits_between:6,10',
            'nombre'=>['required','between:2,150', new Alpha_spaces], 
            'apellidos' =>['required','between:2,150',  new Alpha_spaces], 
            'genero' =>'required',
            'fecha_nac' =>['required','date', new birthdate],
            'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            'descripcion_admin'=>'between:0,200',
            'email'=>'required|email',
            'password'=>['required','confirmed','between:6,100', new password],
        ];
    }
}
