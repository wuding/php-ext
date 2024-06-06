<?php

// namespace Ext\example\date;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";
$include = include ROOT .'/vendor/wuding/php-ext/example/cal/days_in_month.php';

use function php\func\get;

class SunInfo
{
    const VERSION = '24.6.6';
    const REVISION = 3;

    public static function thisYear($variable, $latitude, $longitude)
    {
        $method = \Ext\Date::funcToMethodName(pathinfo(__FILE__, PATHINFO_FILENAME));
        $function = array('\\Ext\\Date', $method);
        $array = array();
        foreach ($variable as $k => $val) {

            $param_arr = get(array(
                'timestamp' => $val,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'options' => array('return_values' => 1, 'timezone' => 'PRC'),
            ));

            $param_arr['options']['return_values'] = (int) $param_arr['options']['return_values'];

            $expression = call_user_func_array($function, $param_arr);

            $arr = array();
            foreach ($expression['date_sun_info'] as $key => $value) {
                $arr[$key] = date('Y-m-d H:i:s', $value);
            }
            $expression['date_sun_info_time'] = $arr;
            $array[] = $expression;
        }

        return $array;
    }
}

$year = 2024;
$latitude = 41.8619;
$longitude = 123.9017;

/*
31.6699
118.4645
*/

$method = \Ext\Date::funcToMethodName(pathinfo(__FILE__, PATHINFO_FILENAME));
$function = array('\\Ext\\Date', $method);
$param_arr = get(array(
    'timestamp' => time(),
    'latitude' => $latitude,
    'longitude' => $longitude,
    'options' => array('return_values' => 1, 'timezone' => 'PRC'),
));

$param_arr['options']['return_values'] = (int) $param_arr['options']['return_values'];

$expression = call_user_func_array($function, $param_arr);

$arr = array();
foreach ($expression['date_sun_info'] as $key => $value) {
    $arr[$key] = date('Y-m-d H:i:s', $value);
}
$expression['date_sun_info_time'] = $arr;
$expression['include'] = $include;
$expression['DaysInMonth::thisYear'] = DaysInMonth::thisYear($year);

$months = array();

foreach ($expression['DaysInMonth::thisYear']['arr'] as $k => $val) {
    $month = $val[0]['month'];
    $days = $val[1] + 1;

    $d = array();
    for ($i = 1; $i < $days; $i++) {
        $date_time = "$year-$k-$i";
        $timestamp = strtotime($date_time);
        $d[] = $timestamp;
    }
    $sun = SunInfo::thisYear($d, $latitude, $longitude);

    $s = array();
    foreach ($sun as $key => $value) {
        $s[] = $value['date_sun_info_time']['sunrise'];
    }
    $months[] = $s;
}
print_r($months);

// print_r($expression);
