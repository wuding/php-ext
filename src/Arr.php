<?php

namespace Ext;

class Arr extends _Abstract
{
    const VERSION = '21.8.10';

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
}
