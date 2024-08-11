<?php

namespace Ext;

class MB extends _Abstract
{
    const VERSION = 24.0811;
    const EDITION = array(
        3,
        0,
        0,
        0,
    );
    const REVISION = 3;

    /*
    +---------------------------------------------+
    + Unicode
    +---------------------------------------------+
    */

    public static function ord($string, $encoding = null, $tobase = null, $options = array('var_dump' => 0))
    {
        $strings = is_array($string) ? $string : array($string);
        $encoding = $encoding ? $encoding : 'UTF-8';

        $origin_results = array();
        foreach ($strings as $key => $string) {
            $origin_result = mb_ord($string, $encoding);
            $origin_results[] = $origin_result;
        }

        $return_values = array();
        foreach ($origin_results as $key => $value) {
            $return_value = is_int($tobase) ? base_convert($value, 10, $tobase) : $value;
            $return_values[] = $return_value;
        }

        if ($options['var_dump'] ?? null) {
            var_dump($expression = [__FILE__, __LINE__,
                [
                    'vars' => get_defined_vars(),
                ],
            ]);
        }

        return $return_values;
    }


    /*
    +---------------------------------------------+
    + Split
    +---------------------------------------------+
    */

    public static function strSplit($string, $length = 1, $encoding = null)
    {
        // $return_values = mb_str_split($string, $length, $encoding);
        return $return_values;
    }


    /*
    +---------------------------------------------+
    + Count
    +---------------------------------------------+
    */

    public static function strCount($string)
    {
        $variable = mb_str_split($string);
        $array = array();
        foreach ($variable as $key) {
            if (array_key_exists($key, $array)) {
                $i = $array[$key];
                $i++;
                $array[$key] = $i;
            } else {
                $array[$key] = 1;
            }
        }
        return $array;
    }
}
