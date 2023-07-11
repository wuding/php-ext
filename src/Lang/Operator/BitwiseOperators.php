<?php

namespace Ext\Lang\Operator;

class BitwiseOperators
{
    const VERSION = '23.7.11';
    const REVISION = 1;

    public static $para = array(
        '$a & $b And 按位与',
        '$a | $b Or(inclusive or) 按位或',
        '$a ^ $b Xor(exclusive or) 按位异或',
        '~ $a Not 按位取反',
        '$a << $b Shift left 左移',
        '$a >> $b Shift right 右移',
    );
}
