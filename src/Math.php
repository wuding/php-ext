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

    /**
     * Convert a number between arbitrary bases
     *
     * @param      string   $number    The number
     * @param      integer  $frombase  The frombase
     * @param      integer  $tobase    The tobase
     *
     * @return     string   ( description_of_the_return_value )
     */
    public static function baseConvert(string $number, int $frombase, int $tobase) : string
    {
        return base_convert($number, $frombase, $tobase);
    }

    /**
     * 模式四舍五入
     */
    public static function round(float $val, int $precision = 0, int $mode = PHP_ROUND_HALF_UP) : float
    {
        return round($val, $precision, $mode);
    }

    /**
     * 存储单位计算
     */
    public static function size($s=NULL, $r=NULL){
        if($r===NULL){
            $r=2;
        }

        $s1=$s/1024;
        $s2=round($s1, $r);
        if($s2<1024){
            $s=round($s1, $r)." KB";

        }else{
            $s3=$s1/1024;
            $s4=round($s3, $r);
            if($s4<1024){
                $s=round($s3, $r)." MB";

            }else{
                $s5=$s3/1024;
                $s=round($s5, $r)." GB";
            }
        }
        return $s;
    }

    /**
     * 存储单位结果适配
     */
    public static function rounds($size, $key = 'kb')
    {
        $increase = array(
            'b' => 1,
            'kb' => 1024,
            'mb' => 1048576,
            'gb' => 1073741824,
            'tb' => 1099511627776,
            'pb' => 1125899906842624,
            # 'eb' => 1.152921504606847e+18,
            # '' => 1.180591620717411e+21,
        );

        $increase = array_reverse($increase);
        $unit_key = 'b';
        foreach ($increase as $unit => $number) {
            if ($number > $size) {
                $size = $size / 1024;
            }
            if ($key == $unit) {
                $unit_key = $key;
                break;
            }
            # print_r([$key, $unit, $number, $size]);
        }
        return array($size, $unit_key);
    }
}
