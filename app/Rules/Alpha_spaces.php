<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Alpha_spaces implements Rule
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
        //
        $valor=trim($value);

        if (("[[:alpha:][:space:]]",$valor)
           or (strlen($valor<1) or (strlen($valor)>30)){
           die('ERROR! Puede que el nombre de la carpeta no cumpla las condiciones.');
        } 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
