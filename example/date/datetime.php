<?php

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT . "/vendor/autoload.php";

use function php\func\get;

$param_arr = get();


$method =  ltrim($_SERVER['PATH_INFO'], '/');
$function = array('\\Ext\\Date', $method ?: 'mkTime');


$expression = call_user_func_array($function, $param_arr);
print_r($expression);

# http://127.0.0.1:86/date/datetime.php/mkTime?0=14&1=49&2=20&3=9&4=16&5=2023
// 1694875760
