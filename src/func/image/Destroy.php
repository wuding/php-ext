<?php

/**
 * Destroy an image
 *
 * https://www.php.net/manual/en/function.imagedestroy.php
 *
 *
 */

namespace Ext\func\image;

class Destroy
{
    const VERSION = '22.5.16';

    public static function _($image)
    {
        $bool = imagedestroy($image);
        return $bool;
    }
}
