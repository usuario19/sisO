<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class JugadorClubRequest extends FormRequest
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
            'club'=> 'required',
            'id_jug' => 'required|unique:jugador_clubs,id_jugador,NULL,NULL,id_club,' . $this->get('club')
        ];
    }
    public function messages()
{
        return [
            'required' => 'Debe seleccionar un club.',
            'unique'=>'El jugador ya esta incrito en este club, por favor recargue la página.'
        ];
    }
}
