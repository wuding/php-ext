<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$param_arr = get(array('operand' => 2, 'scale' => 3));
$function = array('\\Ext\\BC', 'sqrt');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
