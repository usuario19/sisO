<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\Administrador;

class VerificarCi implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //$user_Log = Auth::user()->ci;
        
        if(Auth::user()->ci != $value)
        {
            //return false;
             return Administrador::where('ci',$value)->exists()? false:true; 
        }else
            return true;
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor del campo :attribute ya esta registrado';
    }
}
