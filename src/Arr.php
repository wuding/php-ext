<?php

namespace Ext;

class Arr extends _Abstract
{
    const VERSION = '23.7.3';
    const REVISION = 11;

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

    ## 分类

    ### 键名

    public static function changeKeyCase($array, $case = CASE_LOWER)
    {
        $return_values = array_change_key_case($array, $case);
        return $return_values;
    }
    //: array

    public static function keyExists($key, $array)
    {
        $return_values = array_key_exists($key, $array);
        return $return_values;
    }
    //: bool

    public static function keyFirst($array)
    {
        $return_values = array_key_first($array);
        return $return_values;
    }
    //: int|string|null

    public static function keyLast($array)
    {
        $return_values = array_key_last($array);
        return $return_values;
    }
    //: int|string|null

    public static function keys($array, $filter_value, $strict = false)
    {
        $return_values = array_keys($array);
        $return_values = array_keys($array, $filter_value, $strict);
        return $return_values;
    }
    //: array

    public static function rand($array, $num = 1)
    {
        $return_values = array_rand($array, $num);
        return $return_values;
    }
    //: int|string|array

    public static function array_search($needle, $haystack, $strict = false)
    {
        $return_values = array_search($needle, $haystack, $strict);
        return $return_values;
    }
    //: int|string|false

    public static function key($array)
    {
        $return_values = key($array);
        return $return_values;
    }
    //: int|string|null

    public static function shuffle($array)
    {
        $return_values = shuffle($array);
        return $return_values;
    }
    //: true

    /*
    +---------------------------------------------------------------+
    + 创建改变合并数组
    +---------------------------------------------------------------+
    */

    public static function combine($keys, $values)
    {
        $return_values = array_combine($keys, $values);
        return $return_values;
    }
    //: array

    public static function flip($array)
    {
        $return_values = array_flip($array);
        return $return_values;
    }
    //: array

    public static function mergeRecursive()
    {
        $args = func_get_args();
        $return_values = array_merge_recursive();
        return $return_values;
    }
    //: array

    public static function merge()
    {
        $args = func_get_args();
        $return_values = array_merge();
        return $return_values;
    }
    //: array

    public static function pop(&$array)
    {
        $return_values = array_pop($array);
        return $return_values;
    }
    //: mixed

    public static function push()
    {
        $args = func_get_args();
        $return_values = array_push();
        return $return_values;
    }
    //: int

    public static function shift(&$array)
    {
        $return_values = array_shift($array);
        return $return_values;
    }
    //: mixed

    public static function unshift()
    {
        $args = func_get_args();
        $return_values = array_unshift();
        return $return_values;
    }
    //: int


    public static function array()
    {
        $args = func_get_args();
        $return_values = array();
        return $return_values;
    }
    //: array

    public static function compact()
    {
        $args = func_get_args();
        $return_values = compact();
        return $return_values;
    }
    //: array

    /*
    +---------------------------------------------------------------+
    + 过滤判断替换
    +---------------------------------------------------------------+
    */

    public static function filter($array, $callback = null, $mode = 0)
    {
        $return_values = array_filter($array, $callback, $mode);
        return $return_values;
    }
    //: array

    public static function isList($array)
    {
        $return_values = array_is_list($array);
        return $return_values;
    }
    //: bool

    // 取代一部分
    public static function splice(&$array, $offset, $length = null, $replacement = [])
    {
        $return_values = array_splice($array, $offset, $length, $replacement);
        return $return_values;
    }
    //: array

    /*
    +---------------------------------------------------------------+
    + 列值
    +---------------------------------------------------------------+
    */

    public static function column($array, $column_key, $index_key = null)
    {
        $return_values = array_column($array, $column_key, $index_key);
        return $return_values;
    }
    //: array

    public static function fillKeys($keys, $value)
    {
        $return_values = array_fill_keys($keys, $value);
        return $return_values;
    }
    //: array

    public static function inArray($needle, $haystack, $strict = false)
    {
        $return_values = in_array($needle, $haystack, $strict);
        return $return_values;
    }
    //: bool


    public static function fill($start_index, $count, $value)
    {
        $return_values = array_fill($start_index, $count, $value);
        return $return_values;
    }
    //: array

    public static function pad($array, $length, $value)
    {
        $return_values = array_pad($array, $length, $value);
        return $return_values;
    }
    //: array

    public static function replaceRecursive()
    {
        $args = func_get_args();
        $return_values = array_replace_recursive();
        return $return_values;
    }
    //: array

    public static function replace()
    {
        $args = func_get_args();
        $return_values = array_replace();
        return $return_values;
    }
    //: array

    public static function unique($array, $flags = SORT_STRING)
    {
        $return_values = array_unique($array, $flags);
        return $return_values;
    }
    //: array

    public static function values($array)
    {
        $return_values = array_values($array);
        return $return_values;
    }
    //: array

    /*
    +---------------------------------------------------------------+
    + 分割部分取出
    +---------------------------------------------------------------+
    */

    public static function chunk($array, $length, $preserve_keys = false)
    {
        $return_values = array_chunk($array, $length, $preserve_keys);
        return $return_values;
    }
    //: array


    // 取出一段
    public static function slice($array, $offset, $length = null, $preserve_keys = false)
    {
        $return_values = array_slice($array, $offset, $length, $preserve_keys);
        return $return_values;
    }
    //: array

    public static function extract($array, $flags = EXTR_OVERWRITE, $prefix = "")
    {
        $return_values = extract($array, $flags, $prefix);
        return $return_values;
    }
    //: int

    public static function list()
    {
        $args = func_get_args();
        list($varname) = $args;
        $return_values = get_defined_vars();
        return $return_values;
    }
    //: array

    public static function range($start, $end, $step = 1)
    {
        $return_values = range($start, $end, $step);
        return $return_values;
    }
    //: array

    ### 统计计数

    public static function countValues($array)
    {
        $return_values = array_count_values($array);
        return $return_values;
    }
    //: array

    public static function product($array)
    {
        $return_values = array_product($array);
        return $return_values;
    }
    //: int|float

    public static function sum($array)
    {
        $return_values = array_sum($array);
        return $return_values;
    }
    //: int|float

    public static function count($value, $mode = COUNT_NORMAL)
    {
        $return_values = count($value, $mode);
        return $return_values;
    }
    //: int

    ### 差集

    public static function diffAssoc()
    {
        $args = func_get_args();
        $return_values = array_diff_assoc();
        return $return_values;
    }
    //: array

    public static function diffKey()
    {
        $args = func_get_args();
        $return_values = array_diff_key();
        return $return_values;
    }
    //: array

    public static function diffUassoc()
    {
        $args = func_get_args();
        $return_values = array_diff_uassoc();
        return $return_values;
    }
    //: array

    public static function diffUkey()
    {
        $args = func_get_args();
        $return_values = array_diff_ukey();
        return $return_values;
    }
    //: array


    public static function diff()
    {
        $args = func_get_args();
        $return_values = array_diff();
        return $return_values;
    }
    //: array

    public static function udiffAssoc()
    {
        $args = func_get_args();
        $return_values = array_udiff_assoc();
        return $return_values;
    }
    //: array


    public static function udiffUassoc()
    {
        $args = func_get_args();
        $return_values = array_udiff_uassoc();
        return $return_values;
    }
    //: array

    public static function udiff()
    {
        $args = func_get_args();
        $return_values = array_udiff();
        return $return_values;
    }
    //: array

    ### 交集

    public static function intersectAssoc()
    {
        $args = func_get_args();
        $return_values = array_intersect_assoc();
        return $return_values;
    }
    //: array


    public static function intersectKey()
    {
        $args = func_get_args();
        $return_values = array_intersect_key();
        return $return_values;
    }
    //: array

    public static function intersectUassoc()
    {
        $args = func_get_args();
        $return_values = array_intersect_uassoc();
        return $return_values;
    }
    //: array

    public static function intersectUkey()
    {
        $args = func_get_args();
        $return_values = array_intersect_ukey();
        return $return_values;
    }
    //: array

    public static function interSection()
    {
        $args = func_get_args();
        $return_values = array_intersect();
        return $return_values;
    }
    //: array


    public static function uintersectAssoc()
    {
        $args = func_get_args();
        $return_values = array_uintersect_assoc();
        return $return_values;
    }
    //: array

    public static function uintersectUassoc()
    {
        $args = func_get_args();
        $return_values = array_uintersect_uassoc();
        return $return_values;
    }
    //: array

    public static function unintersect()
    {
        $args = func_get_args();
        $return_values = array_uintersect();
        return $return_values;
    }
    //: array

    ### 回调

    public static function array_map()
    {
        $args = func_get_args();
        $return_values = array_map();
        return $return_values;
    }
    //: array

    public static function reduce($array, $callback, $initial = null)
    {
        $return_values = array_reduce($array, $callback, $initial);
        return $return_values;
    }
    //: mixed

    public static function walkRecursive(&$array, $callback, $arg = null)
    {
        $return_values = array_walk_recursive($array, $callback, $arg);
        return $return_values;
    }
    //: bool

    public static function walk(&$array, $callback, $arg = null)
    {
        $return_values = array_walk($array, $callback, $arg);
        return $return_values;
    }
    //: bool

    ### 排序

    public static function multisort(&$array1, $array1_sort_order = SORT_ASC, $array1_sort_flags = SORT_REGULAR)
    {
        $args = func_get_args();
        $return_values = array_multisort();
        return $return_values;
    }
    //: bool

    public static function reverse($array, $preserve_keys = false)
    {
        $return_values = array_reverse($array, $preserve_keys);
        return $return_values;
    }
    //: array

    public static function arsort($array, $flags = SORT_REGULAR)
    {
        $return_values = arsort($array, $flags);
        return $return_values;
    }
    //: true

    public static function asort($array, $flags = SORT_REGULAR)
    {
        $return_values = asort($array, $flags);
        return $return_values;
    }
    //: true


    public static function krsort($array, $flags = SORT_REGULAR)
    {
        $return_values = krsort($array, $flags);
        return $return_values;
    }
    //: true

    public static function ksort(&$array, $flags = SORT_REGULAR)
    {
        $return_values = ksort($array, $flags);
        return $return_values;
    }
    //: true

    public static function natcasesort(&$array)
    {
        $return_values = natcasesort($array);
        return $return_values;
    }
    //: true

    public static function natsort(&$array)
    {
        $return_values = natsort($array);
        return $return_values;
    }
    //: true

    public static function rsort($array, $flags = SORT_REGULAR)
    {
        $return_values = rsort($array, $flags);
        return $return_values;
    }
    //: true

    public static function sort(&$array, $flags = SORT_REGULAR)
    {
        $return_values = sort($array, $flags);
        return $return_values;
    }
    //: true

    public static function uasort(&$array, $callback)
    {
        $return_values = uasort($array, $callback);
        return $return_values;
    }
    //: true

    public static function uksort(&$array, $callback)
    {
        $return_values = uksort($array, $callback);
        return $return_values;
    }
    //: true

    public static function usort(&$array, $callback)
    {
        $return_values = usort($array, $callback);
        return $return_values;
    }
    //: true

    ### 指针

    public static function current($array)
    {
        $return_values = current($array);
        return $return_values;
    }
    //: mixed

    public static function each($array)
    {
        $return_values = each($array);
        return $return_values;
    }
    //: array

    public static function end(&$array)
    {
        $return_values = end($array);
        return $return_values;
    }
    //: mixed

    public static function next(&$array)
    {
        $return_values = next($array);
        return $return_values;
    }
    //: mixed

    public static function prev(&$array)
    {
        $return_values = prev($array);
        return $return_values;
    }
    //: mixed

    public static function reset(&$array)
    {
        $return_values = reset($array);
        return $return_values;
    }
    //: mixed

}
