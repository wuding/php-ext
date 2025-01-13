<?php

namespace Ext;

class Arrays
{
    const VERSION = 25.0113;
    const REVISION = 2;
    public static $arr = null;

    public function __construct($arr = null)
    {
        if (null !== $arr) {
            self::$arr = $arr;
        }
    }

    // 转换变量为 extract 可用的数组类型
    public static function extract($array = null)
    {
        $var = null === $array ? self::$arr : $array;
        if (!is_array($var)) {
            $var = (array) $var;
        }
        return $var;
    }

    public static function key_unset($variable)
    {
        $haystack = array(
            '',
            null,
        );
        $exclude = $var_array = [];
        if (is_object($variable)) {
            list($variable, $var_array) = (array) $variable;
        }
        extract(self::extract($var_array));

        foreach ($variable as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }

            if (in_array($value, $haystack, true)) {
                unset($variable[$key]);
            }
        }
        return $variable;
    }

    public static function key_replace($arr, $variable)
    {
        foreach ($variable as $key => $value) {
            $arr[$key] = $arr[$value] ?? null;
            unset($arr[$value]);
        }
        return $arr;
    }
}
