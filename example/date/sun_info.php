<?php

// namespace Ext\example\date;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";
$include = include ROOT .'/vendor/wuding/php-ext/example/cal/days_in_month.php';

use function php\func\get;

class SunInfo
{
    const VERSION = 25.0130;
    const REVISION = 4;

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

    static function run($latitude, $longitude)
    {
        $pathinfo_filename = pathinfo(__FILE__, PATHINFO_FILENAME);

        $method = \Ext\Date::funcToMethodName($pathinfo_filename);
        $function = array('\\Ext\\Date', $method);
        $param_arr = get(array(
            'timestamp' => time(),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'options' => array('return_values' => 1, 'timezone' => 'PRC'),
        ));

        $param_arr['options']['return_values'] = (int) $param_arr['options']['return_values'];

        return $expression = call_user_func_array($function, $param_arr);
    }

    static function month($year, $expression, $latitude, $longitude)
    {
        $arr = array();
        foreach ($expression['date_sun_info'] as $key => $value) {
            $arr[$key] = date('Y-m-d H:i:s', $value);
        }
        $expression['date_sun_info_time'] = $arr;
        // $expression['include'] = $include;
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
        return $months;
    }

    static function runMonth($year, $latitude, $longitude)
    {
        $expression = SunInfo::run($latitude, $longitude);
        return $a = SunInfo::month($year, $expression, $latitude, $longitude);
    }

    static function compare($year)
    {
        $latitude = 41.8619;
        $longitude = 123.9017;

        $a = SunInfo::runMonth($year, $latitude, $longitude);

        $latitude = 31.6699;
        $longitude = 118.4645;

        $b = SunInfo::runMonth($year, $latitude, $longitude);

        $arr = [];
        foreach ($b as $key => $value) {
            $val = $a[$key];
            foreach ($val as $k => $v) {
                $vb = $value[$k];
                $sa = substr($v, 0, 16);
                $sb = substr($vb, 0, 16);
                if ($sa === $sb) {
                    $arr[] = [$v, $vb];
                }
            }
        }
        return $arr;
    }
}

$compare = SunInfo::compare(get('year', 2025));
print_r($compare);
