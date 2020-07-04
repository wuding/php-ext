<?php
namespace Ext;

class _Static
{
    public static function __callStatic($name, $arguments)
    {
        if (is_null(static::$instance)) {
            $className = "\Ext\\" . static::$className;
            static::$instance = new $className;
        }
        return call_user_func_array([static::$instance, $name], $arguments);
    }
}
