<?php

define('ROOT', dirname(__DIR__, 3));

$variable = array(
    'FuncRef',
    'func/image/CreateTrueColor',
    'func/image/ColorAllocate',
    'func/image/ColorTransparent',
    'func/image/FilledRectangle',
    'func/image/Png',
    'func/image/Destroy',
);

$files = array();
foreach ($variable as $key => $value) {
    $files[$key] = require ROOT .'/src/'. $value .'.php';
}

use Ext\FuncRef;
use Ext\refs\utilspec\Image;
use Ext\book\Image as GD;
use Ext\ref\Image as GDandImageFunctions;
use Ext\func\image\{CreateTrueColor, ColorAllocate, ColorTransparent, FilledRectangle, Png, Destroy};

class Tests
{
    public static function test()
    {
        // Create a 55x30 image
        $im = CreateTrueColor::_(55, 30);
        $red = ColorAllocate::_($im, 255, 0, 0);
        $black = ColorAllocate::_($im, 0, 0, 0);

        // Make the background transparent
        ColorTransparent::_($im, $black);

        // Draw a red rectangle
        FilledRectangle::_($im, 4, 4, 50, 25, $red);

        // Save the image
        Png::_($im, './imagecolortransparent.png');
        Destroy::_($im);

        var_export([__FILE__, __LINE__, $im]);
    }
}

$result_values = Tests::test();
