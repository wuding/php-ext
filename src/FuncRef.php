<?php

/**
 * Function Reference
 *
 * https://www.php.net/manual/en/funcref.php
 *
 *
 */

namespace Ext;

use Ext\refs\utilspec\Image;
use Ext\book\Image as GD;

class FuncRef
{
    const VERSION = '22.5.15';


    /**
     * Image Processing and Generation
     *
     * https://www.php.net/manual/en/refs.utilspec.image.php
     *
     *
     */

    public function __construct()
    {

    }


    /*
     +--------------------------------------------------------------+
     + GD - Image Processing and GD
     +--------------------------------------------------------------+
    */

    /*
     https://www.php.net/manual/en/book.image.php
    */

    public function image($obj = null, $func = null)
    {
        $result_values = GD::imageColorTransparent();
    }
}
