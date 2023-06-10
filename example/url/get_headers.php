<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\URL;

$url = 'https://www.apple.com/cn/startpage/';

$data = URL::getHeaders($url);
$arr = URL::parseHeaders($data);

print_r($data);
var_dump($arr);
