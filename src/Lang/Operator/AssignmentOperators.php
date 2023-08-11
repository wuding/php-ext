<?php

namespace Ext\Lang\Operator;

class AssignmentOperators
{
    const VERSION = '23.8.11';
    const REVISION = 1;

    public static $para = array(
        'The basic assignment operator is "=". Your first inclienation might be to think of this as "equal to".',
        '$a = ($b = 4) + 5;',
        '$a = 3; $b = &$a;',
        'Arithmetic Assignment Operators',
        'Bitwise Assignment Operators',
        'Other Assignment Operators' => array(
            'Example' => array(
                '$a .= $b',
                '$a ??= $b',
            ),
            'Equivalent' => array(
                '$a = $a . $b',
                '$a = $a ?? $b',
            ),
            'Operation' => array(
                'String Concatenation',
                'Null Coalesce',
            ),
        ),
    );
}
