<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class birthdate implements Rule
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
        if((date('Y') - (integer)substr($value,0,4)) >17 && (date('Y') - (integer)substr($value,0,4)) < 100 )
         {
            //echo substr($value,0,3);
            return true;
         }   
        else
            return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo fecha de nacimiento es incorrecto';
    }
}
