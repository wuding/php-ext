<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\URL;

class GetHeaders
{
    const VERSION = '23.7.15';
    const REVISION = 2;
}

// 获取命令行参数
function options($short = null, $long = null) {
    $shortopts  = "u::r::l::";
    $longopts  = array(
        "url::",
    );
    $opt = getopt($shortopts, $longopts);
    return $opt;
}

/*
var_dump($expression = [__FILE__, __LINE__,
    'opt' => options()['u'],
]);exit;
*/

$url = 'https://www.apple.com/cn/startpage/';
$url = options()['u'] ?: 'https://symbl.cc/en/1F352/';

$data = URL::getHeaders($url);
$arr = URL::parseHeaders($data);

print_r($data);
var_dump($arr);
