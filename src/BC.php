<?php

namespace Ext;

class BC extends _Abstract
{
    const VERSION = 20.2691037;

    public static $ini = array(
        'bcmath.scale' => 0,
    );

    /*
    +---------------------------------------------+
    + 算术
    +---------------------------------------------+
    */

    public static function add($left_operand = null, $right_operand = null, $scale = null)
    {
        if (null === $scale) {
            return bcadd($left_operand, $right_operand);
        }
        return bcadd($left_operand, $right_operand, $scale);
    }

    public static function div($dividend = null, $divisor = null, $scale = null)
    {
        if (null === $scale) {
            return bcdiv($dividend, $divisor);
        }
        return bcdiv($dividend, $divisor, $scale);
    }

    public static function mod($dividend = null, $divisor = null, $scale = null)
    {
        if (null === $scale) {
            return bcmod($dividend, $divisor);
        }
        return bcmod($dividend, $divisor, $scale);
    }

    public static function mul($left_operand = null, $right_operand = null, $scale = null)
    {
        if (null === $scale) {
            return bcmul($left_operand, $right_operand);
        }
        return bcmul($left_operand, $right_operand, $scale);
    }

    public static function pow($base = null, $exponent = null, $scale = null)
    {
        if (null === $scale) {
            return bcpow($base, $exponent);
        }
        return bcpow($base, $exponent, $scale);
    }

    public static function powMod($base = null, $exponent = null, $modulus = null, $scale = null)
    {
        if (null === $scale) {
            return bcpowmod($base, $exponent, $modulus);
        }
        return bcpowmod($base, $exponent, $modulus, $scale);
    }

    public static function sqrt($operand = null, $scale = null)
    {
        if (null === $scale) {
            return bcsqrt($operand);
        }
        return bcsqrt($operand, $scale);
    }

    public static function sub($left_operand = null, $right_operand = null, $scale = null)
    {
        if (null === $scale) {
            return bcsub($left_operand, $right_operand);
        }
        return bcsub($left_operand, $right_operand, $scale);
    }

    /*
    +---------------------------------------------+
    + 比较
    +---------------------------------------------+
    */

    public static function comp($left_operand = null, $right_operand = null, $scale = null)
    {
        if (null === $scale) {
            return bccomp($left_operand, $right_operand);
        }
        return bccomp($left_operand, $right_operand, $scale);
    }

    /*
    +---------------------------------------------+
    + 配置
    +---------------------------------------------+
    */

    public static function scale($scale = null)
    {
        if (null === $scale) {
            return bcscale();
        }
        return bcscale($scale);
    }

    public static function restore($scale = null)
    {
        if (is_numeric($scale)) {
            return bcscale($scale);
        }
        return bcscale(static::$ini['bcmath.scale']);
    }
}
