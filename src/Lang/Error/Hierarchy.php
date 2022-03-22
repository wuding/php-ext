<?php

namespace Ext\Lang\Error;

class Hierarchy
{
    const VERSION = '22.3.21';

    public $error_hierarchy = array(
        'Throwable' => array(
            'Error' => array(
                'ArithmericError' => array(
                    'DivisionByZeroError',
                ),
                'AssertionError',
                'CompileError' => array(
                    'ParseError',
                ),
                'TypeError' => array(
                    'ArgumentCountError',
                ),
                'ValueError' => '\Ext\Lang\Predefined\Exception\ValueError',
                'UnhandledMatchError',
                'FiberError',
            ),
            'Exception',
        ),
    );
}
