<?php

namespace Ext;

class BC extends _Abstract
{
    const VERSION = 20.2690048;

    public static $constants = null;
    public static $constStr = null;
    public static $ini = array(
        'bcmath.scale' => 0,
    );

    /*
    +---------------------------------------------+
    + 算术
    +---------------------------------------------+
    */

    public static function add($left_operand = null, $right_operand = null, $scale = 0)
    {
        return bcadd($left_operand, $right_operand, $scale);
    }

    public static function div($dividend = null, $divisor = null, $scale = 0)
    {
        return bcdiv($dividend, $divisor, $scale);
    }

    public static function mod($dividend = null, $divisor = null, $scale = 0)
    {
        return bcmod($dividend, $divisor, $scale);
    }

    public static function mul($left_operand = null, $right_operand = null, $scale = 0)
    {
        return bcmul($left_operand, $right_operand, $scale);
    }

    public static function pow($base = null, $exponent = null, $scale = 0)
    {
        return bcpow($base, $exponent, $scale);
    }

    public static function powMod($base = null, $exponent = null, $modulus = null, $scale = 0)
    {
        return bcpowmod($base, $exponent, $modulus, $scale);
    }

    public static function sqrt($operand = null, $scale = 0)
    {
        return bcsqrt($operand, $scale);
    }

    public static function sub($left_operand = null, $right_operand = null, $scale = 0)
    {
        return bcsub($left_operand, $right_operand, $scale);
    }

    /*
    +---------------------------------------------+
    + 比较
    +---------------------------------------------+
    */

    public static function comp($left_operand = null, $right_operand = null, $scale = 0)
    {
        return bccomp($left_operand, $right_operand, $scale);
    }

    /*
    +---------------------------------------------+
    + 配置
    +---------------------------------------------+
    */
    public static function scale($scale = 0)
    {
        return bcscale($scale);
    }
}
