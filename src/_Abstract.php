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
}
