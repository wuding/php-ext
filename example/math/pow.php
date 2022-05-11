<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$base = get('base', 2);
$exp = get('exp', 8);

$power = Ext\Math::pow($base, $exp);
print_r($power);
var_dump($power);

