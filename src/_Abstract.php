<?php

namespace Ext;

class _Abstract
{
    const VERSION = '23.7.9';
    const REVISION = 6;

    public static $constants = null;
    public static $constStr = null;
    public static $ini = null;
    public static $defaultValue = null;
    public static $args = array();

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
    public static function _const($string = null)
    {
        $string = $string ?: static::$constStr;
        $variable  = static::_strToArr($string);
        $arr = [];
        foreach ($variable as $name) {
            $arr[$name] = @constant($name) ?? $name;
        }
        return static::$constants = $arr;
    }

    // 字符串转数组
    public static function _strToArr($string = null, $join = '_', $delimiter = ';', $assign = '=', $separator = ',')
    {
        $arr = [];
        $variable = explode($delimiter, $string);
        foreach ($variable as $value) {
            if (!$value) {
                continue 1;
            }
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

    // 配置静态属性
    public static function config($variable = null, $item = 'args', $skipNull = true)
    {
        $item = null === $item ? 'args' : $item;

        foreach ($variable as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if (null === $v && $skipNull) {
                        continue 1;
                    }
                    static::$$item[$key][$k] = $v;
                }
                continue 1;
            }
            static::$$item[$key] = $value;
        }
        return static::$$item;
    }

    // 参数值覆盖默认值
    public static function args($item = null, $variable = [], $skipNull = true)
    {
        $args = self::mergeVars('args');
        $arr = $args[$item] ?? [];
        foreach ($variable as $key => $value) {
            if (null === $value && $skipNull) {
                continue 1;
            }
            $arr[$key] = $value;
        }
        return $arr;
    }

    // 合并静态属性
    public static function mergeVars($varname = null)
    {
        $arr = self::$$varname ?? [];
        $static = static::$$varname ?? [];
        foreach ($static as $key => $value) {
            if (!array_key_exists($key, $arr)) {
                $arr[$key] = $value;
            } else {
                foreach ($value as $k => $v) {
                    $arr[$key][$k] = $v;
                }
            }
        }
        return $arr;
    }

    public static function funcToMethodName($funcname)
    {
        $str_replace = str_replace('_', ' ', $funcname);
        $ucwords = ucwords($str_replace);
        $lcfirst = lcfirst($ucwords);
        $name = str_replace(' ', '', $lcfirst);
        return $name;
    }
}
