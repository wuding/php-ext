<?php

namespace Ext;

class _Abstract
{
    public static $constants = null;
    public static $constStr = null;
    public static $ini = null;

    public function __construct()
    {
        // 遍历 ini 值
        $variable = &static::$ini;
        if (is_array($variable)) {
            foreach ($variable as $key => &$value) {
                $value = ini_get($key);
            }
        }
    }

    // 预定义常量键值对
    public static function _const()
    {
        $variable  = static::_strToArr(static::$constStr);
        $arr = [];
        foreach ($variable as $name) {
            $arr[$name] = constant($name);
        }
        return static::$constants = $arr;
    }

    // 字符串转数组
    public static function _strToArr($string = null, $join = '_', $delimiter = ';', $assign = '=', $separator = ',')
    {
        $arr = [];
        $variable = explode($delimiter, $string);
        foreach ($variable as $value) {
            $val = explode($assign, $value);
            $prefix = $val[0];
            $str = $val[1];
            $suffixes = explode($separator, $str);
            foreach ($suffixes as $suffix) {
                $arr[] = "$prefix$join$suffix";
            }
        }
        return $arr;
    }
}
