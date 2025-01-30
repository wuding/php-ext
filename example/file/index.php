<?php

// version 20241207.1

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;

$param_arr = get();

$method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
$function = array('\\Ext\\File', $method ?: 'exists');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);

// /example/file/index.php/exists?filename=
