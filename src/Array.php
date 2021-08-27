<?php

namespace Ext;

class Array
{
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
}
