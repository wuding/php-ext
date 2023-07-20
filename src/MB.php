<?php

namespace Ext;

class MB extends _Abstract
{
    const VERSION = '23.6.24';
    const EDITION = array(
        2,
        0,
        0,
        0,
    );
    const REVISION = 2;

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

        if ($options['var_dump']) {
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
}
