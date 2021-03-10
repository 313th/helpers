<?php


namespace sahifedp\Helpers;


class Helpers {
    public static function toLatin($number) {
        return str_replace(["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"],
            ["0","1","2","3","4","5","6","7","8","9"],$number);
    }

}
