<?php

/**
 * Create a new true color image
 *
 * https://www.php.net/manual/en/function.imagecreatetruecolor.php
 *
 *
 */

namespace Ext\func\image;

class CreateTrueColor
{
    const VERSION = '22.5.15';

    public static $data = array(
    );

    public function __construct()
    {

    }

    public static function _($width, $height)
    {
        $GdImage = imagecreatetruecolor($width, $height);
        return $GdImage;
    }
}
