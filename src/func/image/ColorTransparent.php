<?php

/**
 * Define a color as transparent
 *
 * https://www.php.net/manual/en/function.imagecolortransparent.php
 *
 *
 */

namespace Ext\func\image;

class ColorTransparent
{
    const VERSION = '22.5.15';

    public static function _($image, $color)
    {
        $int = imagecolortransparent($image, $color);
        return $int;
    }
}
