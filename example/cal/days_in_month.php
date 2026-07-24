<?php

// namespace Ext\example\cal;

defined('ROOT') OR define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class DaysInMonth
{
    const VERSION = 26.0228;
    const REVISION = 5;

    public function __construct()
    {

    }

    public static function thisYear($year, $first = 1, $late = 13)
    {
        $function = array('\\Ext\\CAL', 'daysInMonth');
        $arr = array();
        for ($i = $first; $i < $late; $i++)
        {
            $param_arr = self::get(array(
                'calendar' => CAL_GREGORIAN,
                'month' => $i,
                'year' => $year,
            ));
            $return_values = call_user_func_array($function, $param_arr);
            $arr[$i] = array($param_arr, $return_values);
        }


        $expression = array(
            'function' => $function,
            'arr' => $arr,
        );
        return $expression;
    }

    static function get($variable)
    {
        $arr = [];
        foreach ($variable as $key => $value) {
            $r = $_GET[$key] ?? $value;
            $arr[$key] = $r;
        }
        return $arr;
    }
}

print_r(DaysInMonth::thisYear(2023));
