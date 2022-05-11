<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$function = array('\\Ext\\Date', pathinfo(__FILE__, PATHINFO_FILENAME));
$param_arr = get(array(
    'format' => 'Y-m-d H:i:s',
    'timestamp' => time(),
    'timezone_identifier' => 'PRC',
    'options' => array('return_values' => 1),
));

$param_arr['options']['return_values'] = (int) $param_arr['options']['return_values'];

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
