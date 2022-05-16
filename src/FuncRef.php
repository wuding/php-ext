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
    const VERSION = '22.5.16';

    public $refs = array(
        'utilspec' => array(
            'image' => array(
                '' => 'Image Processing and Generation',
                'image' => 'GD — Image Processing and GD',
            ),
        ),
        'basic' => array(
            'text' => array(
                '' => 'Text Processing',
                'strings' => 'Strings',
            ),
        ),
    );
}
