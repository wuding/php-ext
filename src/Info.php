<?php

namespace Ext;

class Info extends _Abstract
{
    const VERSION = 26.0225;
    const REVISION = 5;
    const EDITION = 185829.1749725909;

    public static $constants = [];
    public static $constStr = 'ASSERT=ACTIVE,CALLBACK,BALL,WARNING,QUIET_EVAL;';

    /*
    +---------------------------------------------+
    + 异常
    +---------------------------------------------+
    */

    public static function assertOptions($what = null, $value = null)
    {
        return assert_options($what, $value);
    }

    /*
    +---------------------------------------------+
    + 运行时
    +---------------------------------------------+
    */

    public static function getDefinedConstants($categorize = false, $cat_name = null)
    {
        $constants = get_defined_constants($categorize);
        if (!$cat_name) {
            return $constants;
        }

        $cat_nm = strtolower($cat_name);
        foreach ($constants as $key => $value) {
            $keyname = strtolower($key);
            if ($cat_nm === $keyname) {
                return $value;
            }
        }
        return false;
    }


    /*
    +---------------------------------------------+
    + 命令行
    +---------------------------------------------+
    */

    public static function getOpt($short_options, $long_options = [], &$rest_index = null)
    {
        $return_values = getopt($short_options, $long_options, $rest_index);
        return $return_values;
    }
    //: array|false


    /*
    +---------------------------------------------+
    + Grabage Collection
    +---------------------------------------------+
    */

    static function gc_collect_cycles()
    {
        return gc_collect_cycles();
    }
    //: int

    static function gc_disable()
    {
        return gc_disable();
    }
    //: void

    static function gc_enable()
    {
        return gc_enable();
    }
    //: void

    static function gc_enabled()
    {
        return gc_enabled();
    }
    //: bool

    static function gc_mem_caches()
    {
        return gc_mem_caches();
    }
    //: int

    static function gc_status()
    {
        return gc_status();
    }
    //: array

    /*
    +---------------------------------------------+
    + 配置
    +---------------------------------------------+
    */

    // 获取一个配置选项的值
    static function ini_get($option)
    {
        return $ini_get = ini_get($option);
    }
    //： string|false


    /*
    +---------------------------------------------+
    + Variables
    +---------------------------------------------+
    */

    static function zend_version()
    {
        return zend_version();
    }
    //: string
}
