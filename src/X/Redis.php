<?php

namespace Ext\X;

/**
 *
 */
class Redis
{
    const REVISION = 1;
    const VERSION = 25.0804;
    static $mem = null;

    function __construct($conf = [])
    {
        self::init($conf);
    }

    function __call($name, $arguments)
    {
        if (!$obj = self::$mem) {
            var_dump([__FILE__, __LINE__, get_defined_vars()]);
            die;
        }

        return call_user_func_array(array($obj, $name), $arguments);
    }

    static function __callStatic($name, $arguments)
    {
        $obj = new static();
        return call_user_func_array(array($obj, $name), $arguments);
    }

    static function init($conf = [])
    {
        if (self::$mem) {
            return self::$mem;
        }

        self::$mem = $Redis = new \Redis();
        extract($conf, EXTR_PREFIX_ALL, 'arg');
        $connect = call_user_func_array([$Redis, 'connect'], $arg_connect);
        $auth = $arg_auth ? $Redis->auth($arg_auth) : $arg_auth;
        $select = $Redis->select($arg_select);
        return self::$mem;
    }
}
