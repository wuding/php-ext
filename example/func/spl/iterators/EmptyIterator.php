<?php

define('ROOT', dirname(__DIR__, 7));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$expression = new \Ext\Func\SPL\Iterators\EmptyIterator;
var_export($expression::VERSION);
