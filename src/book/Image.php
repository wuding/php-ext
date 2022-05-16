<?php

/**
 * Image Processing and GD
 *
 * https://www.php.net/manual/zh/book.image.php
 *
 *
 */

namespace Ext\book;

use Ext\ref\Image as GDandImageFunctions;

class Image
{
    const VERSION = '22.5.15';

    public $intro = array(
        'image' => 'Introduction',
    );

    public $image = array(
        'setup' => array(
            '' => 'Installing/Configuring',
            'requirements',
            'installation',
            'configuration' => 'Runtime Configuration',
            'resources' => 'Resource Types',
        ),
        'constants' => 'Predefiend Constants',
        'examples' => array(
            'examples-png' => 'PNG creation with PHP',
            'examples-watermark' => 'Adding watermarks to images using alpha channels',
            'examples.merged-watermark' => 'Using imagecopymerge to create a translucent watermark',
        ),
    );

    public $ref = array(
        'image' => 'GD and Image Functions',
        'function' => array(
            'imagecolortransparent',
        ),
    );

    public $class = array(
        'GdImage',
        'GdFont',
    );
}
