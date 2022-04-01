<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;
use Pkg\Func;
use Ext\GD;

/*
$filename = 'G:\etc\Image\Icon\soft\7-zip.png';
$image = GD::createFromPng($filename);

$x = 5;
$y = 7;
$index = GD::colorAt($image, $x, $y);

$results = GD::colorsForIndex($image, $index);
*/

$param_arr = array(
    'G:\etc\Image\Icon\soft\sublime_text.png',
);
$variable = array(
    'row' => array(
        'function' => array('\Ext\GD', 'createFromPng'),
        'param_arr' => $param_arr,
    ),
    'a' => array(
        'function' => array('\Ext\GD', 'colorAt'),
        'code_str' => "\$param_arr = array(\$results['row'], 15, 15);",
    ),
    'b' => array(
        'function' => array('\Ext\GD', 'colorsForIndex'),
        'code_str' => "\$param_arr = array(\$results['row'], \$results['a']);",
    ),
);
$results = Func::batch($variable);

var_export($results);
