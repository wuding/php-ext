<?php

namespace Ext;

class Math
{
    const VERSION = '22.3.18';

    /*
    +------------------------------------------------+
    + 指数
    +------------------------------------------------+
    */

    public static function exp($arg)
    {
        $exp = exp($arg);
        return $exp;
    }

    public static function expm1($arg)
    {
        $computed = expm1($arg);
        return $computed;
    }

    public static function pow($base, $exp)
    {
        $power = pow($base, $exp);
        return $power;
    }

    /*
    +--------------------------------------------------+
    + 代数
    +--------------------------------------------------+
    */

    public static function log($arg, $base = M_E)
    {
        $logarithm = log($arg, $base);
        return $logarithm;
    }
}
