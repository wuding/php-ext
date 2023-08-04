<?php

// namespace Ext\example\cal;

defined('ROOT') OR define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class DaysInMonth
{
    const VERSION = '23.8.4';
    const REVISION = 4;

    public function __construct()
    {

    }

    public static function thisYear($year, $first = 1, $late = 13)
    {
        $function = array('\\Ext\\CAL', 'daysInMonth');
        $arr = array();
        for ($i = $first; $i < $late; $i++)
        {
            $param_arr = get(array(
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
}

print_r(DaysInMonth::thisYear(2023));
