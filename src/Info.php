<?php

/*
https://www.php.net/manual/zh/language.operators.errorcontrol.php
错误控制运算符 Error Control Operators
@ at sign
*/

namespace Ext;

class Info extends _Abstract
{
    const VERSION = 25.1108;
    const REVISION = 3;

    static $args = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'ini_set' => [
            'option' => 'string',
            'value' => 'string|int|float|bool|null',
        ],
    ];

    static $return = [
        'ini_set' => 'string|false',
    ];

    static $values = [
        'ini_set' => false,
    ];

    static $func = [
        'ini_set' => [
            'option' => 'string',
            'value' => 'string',
            ':' => 'bool',
        ],
        'php_ini_loaded_file' => [
        ],
    ];

    /*
    +---------------------------------------------------------------+
    + 1. 异常 断言
    +---------------------------------------------------------------+
    */


    /*
    +---------------------------------------------------------------+
    + 2. 命令行 进程
    +---------------------------------------------------------------+
    */


    /*
    +---------------------------------------------------------------+
    + 3. 扩展
    +---------------------------------------------------------------+
    */


    /*
    +---------------------------------------------------------------+
    + 4. 垃圾回收
    +---------------------------------------------------------------+
    */

/*
    https://www.php.net/manual/zh/features.gc.php
    垃圾回收 Garbage Collection
*/

    static function gc_collect_cycles()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    /*
    +---------------------------------------------------------------+
    + 5. 配置 INI
    +---------------------------------------------------------------+
    */

    static function ini_set()
    {
        return static::_call(__FUNCTION__, func_get_args());
    }

    static function php_ini_loaded_file()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    static function php_ini_scanned_files()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    /*
    +---------------------------------------------------------------+
    + 6. 系统 文件
    +---------------------------------------------------------------+
    */

    /*
    +---------------------------------------------------------------+
    + 7. 运行时 常量、变量等
    +---------------------------------------------------------------+
    */

    static function get_defined_constants(){ return self::_call(__FUNCTION__, func_get_args()); }
    static function get_include_path(){ return self::_call(__FUNCTION__, func_get_args()); }
    static function get_included_files(){ return self::_call(__FUNCTION__, func_get_args()); }

/*
    https://www.php.net/manual/zh/ini.core.php#ini.memory-limit
    资源限制 Resource Limits
    memory_limit = "128M"

*/
    static function memory_get_peak_usage()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    static function memory_get_usage()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    static function memory_reset_peak_usage()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    static function php_sapi_name()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    /*
    +---------------------------------------------------------------+
    + 8. 变量 环境、其它
    +---------------------------------------------------------------+
    */
}
