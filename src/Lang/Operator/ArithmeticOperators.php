<?php

namespace Ext\Lang\Operator;

class ArithmeticOperators
{
    const VERSION = '23.8.11';
    const REVISION = 1;

    public static $para = array(
        'Example' => array(
            '$a += $b',
            '$a -= $b',
            '$a *= $b',
            '$a /= $b',
            '$a %= $b',
            '$a **= $b',
        ),
        'Equivalent' => array(
            '$a = $a + $b',
            '$a = $a - $b',
            '$a = $a * $b',
            '$a = $a / $b',
            '$a = $a % $b',
            '$a = $a ** $b',
        ),
        'Operation' => array(
            'Addition',
            'Subtraction',
            'Multiplication',
            'Division',
            'Modulus',
            'Exponentiation',
        ),
    );
}
