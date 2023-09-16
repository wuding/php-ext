<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;
use Ext\CAL;

$param_arr = get(array(
    'julian_day' => 2380000,
    'calendar' => -1,
));
$function = array('\\Ext\\CAL', 'fromJd');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);

// print_r(CAL::_const(CAL::$constStr));
/*
$mktime = mktime(0, 0, 0, 9, 16, 2023);
$today = unixtojd($mktime);
$date = date('Y-m-d H:i:s', $mktime);
print_r([$mktime, $today, $date]);
print_r(cal_from_jd($today, CAL_JEWISH));
*/
