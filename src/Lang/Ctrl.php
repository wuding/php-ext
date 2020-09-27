<?php

namespace Ext\Lang;

class Ctrl extends \Ext\_Abstract
{
    const VERSION = 20.2720077;

    public static $ini = array(
        'include_path' => null,
        'auto_append_file' => null,
        'auto_prepend_file' => null,
    );

    public static $append_file = null;
    public static $prepend_file = null;

    public static function include()
    {

    }

    public static function append($append_file = null)
    {
        $append_file = null === $append_file ? static::$append_file : $append_file;
        return include $append_file;
    }

    public static function prepend($prepend_file = null)
    {
        $prepend_file = null === $prepend_file ? static::$prepend_file : $prepend_file;
        return include $prepend_file;
    }
}
