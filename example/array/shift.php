<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$arr = array('shutdown', 10, 16, 36, 62, 2);
$first = \Ext\Arr::shift($arr);

var_export($first);
var_export($arr);
