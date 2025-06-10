<?php

namespace Ext;

class MB extends _Abstract
{
    const VERSION = 25.0610;
    const EDITION = array(
        3,
        0,
        0,
        0,
    );
    const REVISION = 6;

    // 方法版本要求
    /*
    null 不执行
    true 强制执行
    false 使用替代
    */
    public static $versionLt = [
        'trim' => false,
    ];

    /*
    +---------------------------------------------+
    + Unicode
    +---------------------------------------------+
    */

    public static function ord($string, $encoding = null, $tobase = null, $options = array('var_dump' => 0))
    {
        $strings = is_array($string) ? $string : array($string);
        $encoding = $encoding ? $encoding : 'UTF-8';

        $origin_results = array();
        foreach ($strings as $key => $string) {
            $origin_result = mb_ord($string, $encoding);
            $origin_results[] = $origin_result;
        }

        $return_values = array();
        foreach ($origin_results as $key => $value) {
            $return_value = is_int($tobase) ? base_convert($value, 10, $tobase) : $value;
            $return_values[] = $return_value;
        }

        if ($options['var_dump'] ?? null) {
            var_dump($expression = [__FILE__, __LINE__,
                [
                    'vars' => get_defined_vars(),
                ],
            ]);
        }

        return $return_values;
    }


    /*
    +---------------------------------------------+
    + Split
    +---------------------------------------------+
    */

    public static function strSplit($string, $length = 1, $encoding = null)
    {
        // $return_values = mb_str_split($string, $length, $encoding);
        return $return_values;
    }


    /*
    +---------------------------------------------+
    + Count
    +---------------------------------------------+
    */

    public static function strCount($string)
    {
        $variable = mb_str_split($string);
        $array = array();
        foreach ($variable as $key) {
            if (array_key_exists($key, $array)) {
                $i = $array[$key];
                $i++;
                $array[$key] = $i;
            } else {
                $array[$key] = 1;
            }
        }
        return $array;
    }

    // 曾经我的称谓
    // 现在又属于谁
    static function mb_strlen($string, $encoding = null)
    {
        return mb_strlen($string, $encoding);
    }
    //: int

    /*
    +---------------------------------------------+
    + format
    +---------------------------------------------+
    */

    /*
IDSP?
'　'
    */

    public static function trim($string, $characters = null, $encoding = null)
    {
        // s
        // f
        $return_values = $return_value = null;

        // z
        $vc = version_compare(phpversion(), '8.4.0', '>=');

        // l
        if (true === $vc) {
            __EX__:
            // s
            $return_value = mb_trim($string, $characters, $encoding);

        } else {
            $pattern = "[　]+";
            $mer = mb_ereg_replace($pattern, '', $string);
            $variable = self::$versionLt['trim'];
            if (null === $variable) {
                $return_value = $mer;
            } elseif (false === $variable) {
                $return_value = trim($mer);
            } else {
                goto __EX__;
            }
        }

        // j

        // g
        $return_values = $return_value;
        return $return_values;
    }

    /*
    +---------------------------------------------+
    + Regular expression
    +---------------------------------------------+
    */

    static function mb_ereg($pattern, $string, &$matches = null)
    {
        $mb_ereg = mb_ereg($pattern, $string, $matches);
        return get_defined_vars();
    }

    static function mb_ereg_match($pattern, $string, $options = null)
    {
        $res = mb_ereg_match($pattern, $string, $options);
        return get_defined_vars();
    }

    static function mb_split($pattern, $string, $limit = -1)
    {
        $res = mb_split($pattern, $string, $limit);
        return get_defined_vars();
    }
}
