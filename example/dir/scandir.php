<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$directory = '/Users/benny/Documents/GitHub/未命名文件夹/main/docs/books/9787100026017_XINHUA ZIDIAN/Main body';
$dir = \Ext\Directory::scan($directory);
print_r($dir);
