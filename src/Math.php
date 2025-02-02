<?php

namespace Ext;

class Math
{
    const VERSION = 25.0202;
    const REVISION = 2;

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

    /*
    +--------------------------------------------------+
    + 处理小数
    +--------------------------------------------------+
    */

    /**
     * 小数为 0 不显示
     */
    public static function floors($val, $precision = 0)
    {
        $pieces = explode('.', $val);
        $decimals = $pieces[1] ?? '';
        $decimal = substr($decimals, 0, $precision);
        if ($decimal) {
            $pieces[1] = $decimal;
        }
        return implode('.', $pieces);

    }
}
