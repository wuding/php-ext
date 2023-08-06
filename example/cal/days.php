<?php

defined('ROOT') OR define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";
$include = include '/Users/benny/Documents/URLNK/Server/Domain/urlnk/com/@/php-app_develop/vendor/wuding/php-ext/example/cal/days_in_month.php';

use function php\func\get;

class Days
{
    const VERSION = '23.8.6';
    const REVISION = 1;

    public static function thisYear($year)
    {
        $arr = DaysInMonth::thisYear($year);

        $months = array();

        $n = 1;
        foreach ($arr['arr'] as $k => $val) {
            $month = $val[0]['month'];
            $days = $val[1] + 1;

            $day = array();
            for ($i = 1; $i < $days; $i++) {
                $date_time = "$year-$k-$i";
                $timestamp = strtotime($date_time);
                $day_values = array(
                    $n,
                    $timestamp,
                );
                $day[] = $day_values;
                $n++;
            }

            $months[] = $day;
        }
        return $months;
    }
}

print_r(Days::thisYear(2023));
