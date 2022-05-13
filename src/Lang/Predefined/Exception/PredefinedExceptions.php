<?php

namespace Ext\Lang\Predefined\Exception;

class PredefinedExceptions
{
    const VERSION = '22.5.13';

    public $table_of_contents = array(
        'Exception',
        'ErrorException',
        'Error',
        'ArgumentCountError',
        'ArithmeticError',
        'AssertionError',
        'DivisionByZeroError',
        'CompileError',
        'ParseError',
        'TypeError',
        'ValueEoor',
        'UnhandledMatchError',
        'FiberError',
    );

    public $urls = array(
        'https://www.php.net/manual/en/class.errorexception.php',
    );
}
