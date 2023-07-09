<?php

// namespace Ext\example\date;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";
$include = include '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/vendor/wuding/php-ext/example/cal/days_in_month.php';

use function php\func\get;

class SunInfo
{
    const VERSION = '23.7.9';
    const REVISION = 2;

    public static function thisYear($variable)
    {
        $method = \Ext\Date::funcToMethodName(pathinfo(__FILE__, PATHINFO_FILENAME));
        $function = array('\\Ext\\Date', $method);
        $array = array();
        foreach ($variable as $k => $val) {

            $param_arr = get(array(
                'timestamp' => $val,
                'latitude' => 41.8619,
                'longitude' => 123.9017,
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

$method = \Ext\Date::funcToMethodName(pathinfo(__FILE__, PATHINFO_FILENAME));
$function = array('\\Ext\\Date', $method);
$param_arr = get(array(
    'timestamp' => time(),
    'latitude' => 41.8619,
    'longitude' => 123.9017,
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
$expression['DaysInMonth::thisYear'] = DaysInMonth::thisYear(2023);

$months = array();

foreach ($expression['DaysInMonth::thisYear']['arr'] as $k => $val) {
    $month = $val[0]['month'];
    $days = $val[1] + 1;

    $day = array();
    for ($i = 1; $i < $days; $i++) {
        $date_time = "2023-$k-$i";
        $timestamp = strtotime($date_time);
        $d = SunInfo::thisYear([$timestamp]);
        $day[] = $d[0]['date_sun_info_time']['sunrise'];
    }

    $months[] = $day;
}
print_r($months);

// print_r($expression);
