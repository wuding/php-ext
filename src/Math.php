<?php

namespace Ext;

class Math extends _Abstract
{
    const REVISION = 1;
    const VERSION = 25.0708;

    static $func = [
    ];

/*
custom
*/
    static function base62Decode($string)
    {
        $dictionary = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = strlen($string);
        $result = 0;
        for ($i = 0; $i < $length; $i++) {
            $index = strpos($dictionary, $string[$i]);
            $result = $result * 62 + $index;
        }
        return $result;
    }

    static function base62Encode($number)
    {
        $dictionary = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        while ($number > 0) {
            $result = $dictionary[$number % 62] . $result;
            $number = floor($number / 62);
        }
        return $result;
    }
}
