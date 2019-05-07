<?php

/**
 * Mathematical Functions Class
 */

namespace Ext;

class Math
{
    /**
     * Predefined Constants
     *
     * @var        array
     */
    public static $constants = [];

    /**
     *  構建函數
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * 初始化方法
     */
    public function init()
    {
        self::$constants = [
            'M_PI' => M_PI,
            'M_E' => M_E,
            'M_LOG2E' => M_LOG2E,
            'M_LOG10E' => M_LOG10E,
            'M_LN2' => M_LN2,
            'M_LN10' => M_LN10,
            'M_PI_2' => M_PI_2,
            'M_PI_4' => M_PI_4,
            'M_1_PI' => M_1_PI,
            'M_2_PI' => M_2_PI,
            'M_SQRTPI' => M_SQRTPI,
            'M_2_SQRTPI' => M_2_SQRTPI,
            'M_SQRT2' => M_SQRT2,
            'M_SQRT3' => M_SQRT3,
            'M_SQRT1_2' => M_SQRT1_2,
            'M_LNPI' => M_LNPI,
            'M_EULER' => M_EULER,
            'PHP_ROUND_HALF_UP' => PHP_ROUND_HALF_UP,
            'PHP_ROUND_HALF_DOWN'=> PHP_ROUND_HALF_DOWN,
            'PHP_ROUND_HALF_EVEN' => PHP_ROUND_HALF_EVEN,
            'PHP_ROUND_HALF_ODD' => PHP_ROUND_HALF_ODD,
            'NAN' => NAN,
            'INF' => INF,
        ];
    }

    /**
     * Round fractions down
     *
     * @param      float    $value     The value
     * @param      integer  $decimals  The decimals
     *
     * @return     float    ( description_of_the_return_value )
     */
    public static function floor($value, $decimals = 0)
    {
        if (0 < $decimals) {
            return self::numberFloor($value, $decimals);
        }
        return floor($value);
    }

    /**
     * 省略小數點
     *
     * @param      float    $value     The value
     * @param      integer  $decimals  The decimals
     *
     * @return     float    ( description_of_the_return_value )
     */
    public static function numberFloor($value, $decimals = 0)
    {
        if (!preg_match('/\./', $value)) {
            return $value;
        }

        $exp = explode('.', $value);
        $len = strlen($exp[1]);
        if (2 < $len) {
            $exp[1] = substr($exp[1], 0, $decimals);
        }
        return $imp = implode('.', $exp);
    }
}
