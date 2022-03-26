<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$lyrics = array(
    'song' => 'Be My Baby',
);

$param_arr = array($lyrics, array('song'));
$function = array('\\Ext\\Variable', 'unSet');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);
