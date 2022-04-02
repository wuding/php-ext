<?php

namespace Ext;

class Arr extends _Abstract
{
    const VERSION = '22.4.2';

    public static $predefined_constants = array(
        /* array_change_key_case() */
        'CASE_LOWER',
        'CASE_UPPER',

        /* array_multisort() */
        'SORT_ASC',
        'SORT_DESC',

        /* Sorting type flags */
        'SORT_REGULAR',
        'SORT_NUMERIC'
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
}
