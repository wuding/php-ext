<?php

namespace Ext\Lang\Type;

class NULL
{
    const VERSION = '22.3.26';

    public $para = array(
        '' => array(
            'A variable is considered to be null if' => array(
                'it has been assigned the constant null',
                'it has not been set to any value yet',
                'it has been unset()',
            ),
        ),
        'Syntax' => array(
            'There is only one value of type null, and that is the case-insensitive constant null',
            'See also the functions' => array(
                'is_null',
                'unset',
            ),

        ),
        'Casting to null' =>  array(
            '' => 'Casting a variable to null using (unset) $var will not remove the variable or unset its value. It will return a null value.',
            'warning' => 'This feature has been DEPRECATED as of PHP 7.2.0, and REMOVED as of PHP 8.0.0. Relying on this features is highly discouraged.',
        ),
    );
}
