<?php

namespace Ext;

class Arrays
{
    const VERSION = 25.0716;
    const REVISION = 6;
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

    static function key_remove($variable, $array)
    {
        foreach ($variable as $key) {
            if (array_key_exists($key, $array)) {
                unset($array[$key]);
            }
        }
        return $array;
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

    static function key_preg_replace($variable, $pattern, $replacement = '')
    {
        $arr = [];
        foreach ($variable as $key => $value) {
            $new_key = preg_replace($pattern, $replacement, $key);
            if ($key !== $new_key) {
                $arr[$new_key] = $key;
            }
        }
        return $arr;
    }

    static function array_shift(&$array, $var_array = [])
    {
        if (is_numeric($var_array)) {
            $var_array = [
                'gt' => $var_array,
            ];
        } elseif (is_bool($var_array)) {
            $var_array = [
                'reference' => $var_array,
            ];
        }

        // 引用赋值
        $reference = true;
        // 大于
        $gt = null;
        extract($var_array);

        $count = count($array);
        if (is_numeric($gt)) {
            if ($count > $gt) {
                unset($var_array['gt']);
                return self::array_shift($array, $var_array);

            } else {
                return null;
            }
        }

        if (!$reference) {
            $arr = $array;
            $array_shift = array_shift($arr);

        } else {
            $array_shift = array_shift($array);
        }
        return $array_shift;
    }

/*
custom
*/

    static function keyValue($var_array, $variable, $array)
    {
        $delimiter = ',';
        extract($var_array);

        if (is_string($variable)) {
            $variable = explode($delimiter, $variable);
        }
        if (!is_array($array)) {
            $array = (array) $array;
        }

        $arr = [];
        foreach ($variable as $key => $value) {
            $item = $array[$value] ?? null;
            $arr[$value] = $item;
        }
        return $arr;
    }

    static function valueCompare($var_array, $variable, $array)
    {
        $var = self::keyValue($var_array, $variable, $array);
        $arr = [];
        foreach ($var as $key => $value) {
            foreach ($var as $k => $v) {
                $compare = $value === $v;
                if (!$compare) {
                    $arr[] = [$key, $k];
                }
            }
        }
        return $arr;
    }

    static function valueEmpty($var_array, $variable, $array)
    {
        $var = self::keyValue($var_array, $variable, $array);
        $arr = [];
        foreach ($var as $key => $value) {
            if (!$value) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}
