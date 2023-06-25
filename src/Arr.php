<?php

namespace Ext;

class Arr extends _Abstract
{
    const VERSION = '23.6.24';
    const REVISION = 8;

    public static $predefined_constants = array(
        /* array_change_key_case() */
        'CASE_LOWER',
        'CASE_UPPER',

        /* array_multisort() */
        'SORT_ASC',
        'SORT_DESC',

        /* Sorting type flags */
        'SORT_REGULAR',
        'SORT_NUMERIC',
        'SORT_STRING',
        'SORT_LOCALE_STRING',
        'SORT_NATURAL',
        'SORT_FLAG_CASE',

        /* Filter flags: array_filter() */
        'ARRAY_FILTER_USE_KEY',
        'ARRAY_FILTER_USE_BOTH',

        'COUNT_NORAML',
        'COUNT_RECURSIVE',

        'EXTR_OVERWRITE',
        'EXTR_SKIP',
        'EXTR_PREFIX_SAME',
        'EXTR_PREFIX_ALL',
        'EXTR_PREFIX_INVALID',
        'EXTR_PREFIX_IF_EXISTS',
        'EXTR_IF_EXISTS',
        'EXTR_REFS',
    );

    // 通过键名获取交集
    public static function intersect($var = null, $variable = array())
    {
        $trans = $var;
        if (is_string($var)) {
            $trans = explode(',', $var);
        }

        $arr = array_flip($trans);
        $array = array_intersect_key($variable, $arr);
        return $array;
    }

    public static function changeKeyName($array, $replace, $unset = null)
    {
        foreach ($replace as $key => $value) {
            $array[$value] = $array[$key] ?? null;
            if (true === $unset) {
                unset($array[$key]);
            }
        }
        return $array;
    }

    public static function fixType($array, $types)
    {
        foreach ($types as $key => $type) {
            $value = $array[$key] ?? null;
            $code_str = "return \$val = ($type) \"$value\";";
            $val = eval($code_str);
            $array[$key] = $val;
        }
        return $array;
    }


    /*
    +---------------------------------------------------------------+
    + 创建改变合并数组
    +---------------------------------------------------------------+
    */

    public static function shift(&$array)
    {
        $return_values = array_shift($array);
        return $return_values;
    }


    /*
    +---------------------------------------------------------------+
    + 过滤判断替换
    +---------------------------------------------------------------+
    */

    // 取代一部分
    public static function splice(&$array, $offset, $lenght = null, $replacement = [])
    {
        $return_values = array_splice($array, $offset, $lenght, $replacement);
        return $return_values;
    }


    /*
    +---------------------------------------------------------------+
    + 列值
    +---------------------------------------------------------------+
    */

    public static function inArray($needle, $haystack, $strict = false)
    {
        $return_values = in_array($needle, $haystack, $strict);
        return $return_values;
    }


    public static function fill($start_index, $count, $value)
    {
        $return_values = array_fill($start_index, $count, $value);
        return $return_values;
    }

    /*
    +---------------------------------------------------------------+
    + 分割部分取出
    +---------------------------------------------------------------+
    */

    // 取出一段
    public static function slice($array, $offset, $length = null, $preserve_keys = false)
    {
        $return_values = array_slice($array, $offset, $length, $preserve_keys);
        return $return_values;
    }

    /*
    +---------------------------------------------------------------+
    + 大小写
    +---------------------------------------------------------------+
    */

    public static function ucFirst($string)
    {
        $mb_strlen = mb_strlen($string);
        if (1 === $mb_strlen) {
            $mb_ord = mb_ord($string);
            if (122  < $mb_ord) {
                return $string;
            }
        }

        $return_values = ucfirst($string);
        return $return_values;
    }
}
