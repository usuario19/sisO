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

        return (preg_match("/^[A-Za-z*.\s]+$/",$valor));

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute solo puede contener letras.';
    }
}
