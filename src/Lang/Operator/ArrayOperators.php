<?php

namespace Ext\Lang\Operator;

class ArrayOperatos
{
    const VERSION = '22.4.16';

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
