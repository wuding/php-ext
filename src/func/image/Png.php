<?php

/**
 * Output a PNG image to either the browser or a file
 *
 * https://www.php.net/manual/en/function.imagepng.php
 *
 *
 */

namespace Ext\func\image;

class Png
{
    const VERSION = '22.5.16';

    public static function _($image, $file = null, $quality = -1, $filters = -1)
    {
        $bool = imagepng($image, $file, $quality, $filters);
        return $bool;
    }
}
