<?php

// version 2.250610123749

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;

$param_arr = get();

$method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
$function = array('\\Ext\\MB', $method ?: 'strCount');

$expression = call_user_func_array($function, $param_arr);
var_dump($expression);

// /example/mb/index.php/strCount?string=抓娃娃
