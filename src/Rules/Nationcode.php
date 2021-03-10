<?php


namespace sahifedp\Helpers\Rules;

use Illuminate\Contracts\Validation\Rule;
use sahifedp\Helpers\Helpers;

class Nationcode implements Rule {

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
        if(!is_numeric($code) || strlen($code) != 10){
            return false;
        }
        $chars = str_split($code);
        $sum = 0;
        for($i=0;$i<=8;$i++){
            $sum += ((int)$chars[$i]) * ($i+1);
        }
        $mod = $sum % 11;
        if($mod < 2){
            if($mod == (int)$chars[9]){
                return true;
            }
        }else{
            if((11 - $mod) == (int)$chars[9]){
                return true;
            }
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
        return "فیلد :attribute یک کدملی معتبر نیست";
    }
}
