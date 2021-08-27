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
}