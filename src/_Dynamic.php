<?php
namespace Ext;

class _Dynamic
{
    public static $constants = array();
    public static $constPrefix = null;
    public static $constStr = null;

    // 可以动态方式访问静态方法
    public static function _init()
    {
        if (true === static::$constPrefix) {
            $arr = self::stringToArray(static::$constStr);
        } else {
            $arr = preg_split('/[|,]+/', static::$constStr);
        }

        foreach ($arr as $name) {
            if (!$name) {
               continue 1;
            }

            if (static::$constPrefix && is_string(static::$constPrefix)) {
                $name = static::$constPrefix .'_'. $name;
            }
            static::$constants[$name] = constant($name);
        }
        return static::$constants;
    }

    public static function stringToArray($string)
    {
        $arr = [];
        $pieces = explode(';', $string);
        foreach ($pieces as $value) {
            $val = explode('=', $value);
            $key = $val[0];
            $suffix = explode(',', $val[1]);
            foreach ($suffix as $su) {
                $arr[] = $full = $key . "_$su";
            }
        }
        return $arr;
    }

    public static function arrayToString($variable)
    {
        $pre = [];
        foreach ($variable as $string) {
            $pieces = explode('_', $string);
            $p = array_shift($pieces);
            if (!isset($pre[$p])) {
                $pre[$p] = [];
            }
            $suffix = implode('_', $pieces);
            $pre[$p][] = $suffix;
        }

        $pieces = [];
        foreach ($pre as $key => $value) {
            $val = implode(',', $value);
            $pieces[] = "$key=$val";
        }
        return $string = implode(';', $pieces);
    }

    public function getVar($varname)
    {
        return $this->$varname;
    }
}
