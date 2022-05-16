<?php

/**
 * Image Processing and Generation
 *
 * https://www.php.net/manual/zh/refs.utilspec.image.php
 *
 *
 */

namespace Ext\refs\utilspec;

use Ext\book\Image as GD;

class Image
{
    const VERSION = '22.5.16';

    public $book = array(
        'image' => array(
            '' => 'GD — Image Processing and GD',
            'intro' => array(
                'image' => 'Introduction',
            ),
            'image' => array(
                'setup',
                'constants',
                'examples'
            ),
            'ref' => array(
                'image',
            ),
            'class' => array(
                'GdImage',
                'GdFont',
            ),
        ),
    );
}
