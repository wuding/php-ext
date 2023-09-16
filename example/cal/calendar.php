<?php

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT . "/vendor/autoload.php";

use function php\func\get;

$param_arr = get();


$method =  ltrim($_SERVER['PATH_INFO'], '/');
$function = array('\\Ext\\CAL', $method ?: 'easterDate');


$expression = call_user_func_array($function, $param_arr);
// print_r($expression);
var_dump($expression);


$format = 'M-d-Y';
$date = date($format, $expression);
// echo $date;

# http://127.0.0.1:86/calendar.php/easter_date?year=2023&mode=
# http://127.0.0.1:86/calendar.php/easterDays?year=2023&mode=0
# http://127.0.0.1:86/cal/calendar.php/unixToJd?timestamp=1694875760
# http://127.0.0.1:86/cal/calendar.php/jdToUnix?julian_day=2460217
# http://127.0.0.1:86/cal/calendar.php/jdtofrench?julian_day=2380900
