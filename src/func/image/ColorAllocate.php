<?php

/**
 * Allocate a color for an iamge
 *
 * https://www.php.net/manual/en/function.imagecolorallocate.php
 *
 *
 */

namespace Ext\func\image;

class ColorAllocate
{
    const VERSION = '22.5.15';

    public static function _($image, $red, $green, $blue)
    {
        $int = imagecolorallocate($image, $red, $green, $blue);
        return $int;
    }
}
