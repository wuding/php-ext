<?php

namespace Ext\Lang\Type;

class Booleans
{
    const VERSION = '22.3.26';

    public $para = array(
        '' => array(
            'It can be either true or false',
        ),
        'Syntax' => array(
            'To specify a bool literal, use the constants true or false. Both are case-insensitive.',
            'Typically, the result of an operator which returns a bool value is passed on to a control structure.',
        ),
        'Converting to boolean' => array(
            'To explicitly convert a value to bool, use the (bool) or (boolean) casts. However, in most cases the cast is unnecessary, since a value will be automatically converted if an operator, function or control structure requires a bool argument.',
            'See also' => 'Type Juggling',
            'When converting to bool, the following values are considered false' => array(
                'the boolean false itsself',
                'the interger 0 (zero)',
                'the floats 0.0 and -0.0 (zero)',
                'the empty string, and the string "0"',
                'an array with zero elements',
                'the special type NULL (including unset variables)',
                'SimpleXML objects created form attributeless empty elements, i.e. elements with which have neither children nor attributes.',
            ),
            'Every other value is considered true (including any resource and NAN).' => true,
            'warning' => '-1 is considered true, like any other non-zero (whether negative or positive) number!',
        ),
    );
}
