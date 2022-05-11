<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$arg = get('arg', 2);

$exp = Ext\Math::exp($arg);
print_r($exp);
var_dump($exp);

