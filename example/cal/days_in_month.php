<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$param_arr = get(array('calendar' => CAL_GREGORIAN, 'month' => 8, 'year' => 2003));
$function = array('\\Ext\\CAL', 'daysInMonth');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
