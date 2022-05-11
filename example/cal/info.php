<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$param_arr = get(array('calendar' => -1));
$function = array('\\Ext\\CAL', 'info');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
