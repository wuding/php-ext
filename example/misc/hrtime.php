<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$param_arr = array(false);
$function = array('\\Ext\\Misc', 'hrtime');

$expression = call_user_func_array($function, $param_arr);
var_export($expression);
