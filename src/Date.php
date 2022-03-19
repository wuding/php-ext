<?php

namespace Ext;

class Date extends _Abstract
{
    const VERSION = 20.5880619;

    /*
    +---------------------------------------------+
    + 时间戳
    +---------------------------------------------+
    */

    public static function microTime($var_array = null, $type = null, $scale = null)
    {
        if (is_bool($type)) {
            return microtime($type);
        }

        $return_all = null;
        if (is_array($var_array)) {
            extract($var_array);
        }

        $string = microtime();
        list($decimal, $integer) = explode(' ', $string);

        $dec = substr($decimal, 1);
        if (is_numeric($scale)) {
            $length = 1 + $scale;
            $dec = substr($decimal, 1, $length);
        }
        $number = $subject = $integer . $dec;

        switch ($type) {
            case 'int':
                $number = str_replace('.', '', $subject);
                break;
        }
        return $return_all ? get_defined_vars() : $number;
    }

    /*
    +---------------------------------------------+
    + 格式化
    +---------------------------------------------+
    */

    public static function date($format, $timestamp, $timezone_identifier = null, $options = null)
    {
        $return_values = null;
        if (is_array($options)) {
            extract($options);
        }
        $timezone = $timezone_identifier ? date_default_timezone_set($timezone_identifier) : null;
        $formatted_date_string = date($format, $timestamp);
        if (1 === $return_values) {
            return get_defined_vars();
        }
        return $formatted_date_string;
    }
}
