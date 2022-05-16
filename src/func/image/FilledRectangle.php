<?php

/**
 * Draw a filled rectangle
 *
 * https://www.php.net/manual/en/function.imagefilledrectangle.php
 *
 *
 */

namespace Ext\func\image;

class FilledRectangle
{
    const VERSION = '22.5.15';

    public static function _($image, $x1, $y1, $x2, $y2, $color)
    {
        $bool = imagefilledrectangle($image, $x1, $y1, $x2, $y2, $color);
        return $bool;
    }
}
