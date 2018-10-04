<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Administrador;
use App\Rules\Alpha_spaces;



class UpdateAdministradorRequest extends FormRequest
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
            'ci'=>['required','numeric'],
            'nombre'=>['required','max:100', new Alpha_spaces], 
            'apellidos' =>['required','max:150',  new Alpha_spaces], 
            'genero' =>'required',
            'fecha_nac' =>'required|date',
            'foto_admin' =>'mimes:jpeg,bmp,png,jpg|max:5120',
            //'descripcion_admin'=>'required|max:200',
            'email'=>'required|email',
            //'password'=>'required',
        ];
    }
}
