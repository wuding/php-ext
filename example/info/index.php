<?php

// version 20250612.1 build 200634.1749729994

$constant_name = 'ROOT';
$value = dirname(__DIR__, 5);

$str = $_SERVER['PATH_INFO'] ?? '';
$characters = '/';

define($constant_name, $value);
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;

$param_arr = get();

$method = ltrim($str, $characters);
$function = array('\\Ext\\Info', $method ?: 'zend_version');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);

// /example/info/index.php/gc_mem_caches?
