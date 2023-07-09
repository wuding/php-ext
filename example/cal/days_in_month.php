<?php

// namespace Ext\example\cal;

defined('ROOT') OR define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class DaysInMonth
{
    const VERSION = '23.7.9';
    const REVISION = 3;

    public function __construct()
    {

    }

    public static function thisYear($year)
    {
        $function = array('\\Ext\\CAL', 'daysInMonth');
        $arr = array();
        for ($i = 1; $i < 13; $i++)
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
