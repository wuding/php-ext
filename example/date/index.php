<?php

// version 20250128.1

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;


$param_arr = get();

$method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
$function = array('\\Ext\\Date', $method ?: 'timezone_version_get');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);


$time = time();
$three = substr($time, 3, 3);
$four = substr($time, 6);
// print_r([$time, "&#$three;", "&#$four;"]);
// /example/date/index.php/timezone_version_get
