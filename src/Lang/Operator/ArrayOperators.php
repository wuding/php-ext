<?php

namespace Ext\Lang\Operator;

class ArrayOperators
{
    const VERSION = '23.7.6';
    const REVISION = 2;

    public static $para = array(
        'Array Operators' => array(
            'Union' => array('$a + $b'),
            'Equality' => array('$a == $b'),
            'Identity' => array('$a === $b'),
            'Inequality' => array(
                '$a != $b',
                '$a <> $b',
            ),
            'Non-identity' => array('$a !== $b'),
        ),
    );
}
