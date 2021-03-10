<?php


namespace sahifedp\Helpers\Rules;

use Illuminate\Contracts\Validation\Rule;
use sahifedp\Helpers\Helpers;

class Digit implements Rule {

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $code = Helpers::toLatin($value);
        if(is_numeric($code)){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "فیلد :attribute باید عددی باشد";
    }
}
