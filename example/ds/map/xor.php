<?php

define('ROOT', dirname(__DIR__, 6));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$param_arr = array(
    null,
    array(
        ["a" => 1, "b" => 2, "c" => 3],
        ["b" => 4, "c" => 5, "d" => 6],
    ),
);
$function = array('\\Ext\\Ds', 'xor');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
