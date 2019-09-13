<?php

namespace Ext;

class _Abstract
{
    public static $constants = array();

    public function init()
    {
        $constants_array = explode('|', self::$constants_string);
        foreach ($constants_array as $constant_name) {
            eval("\$const = $constant_name;");
            self::$constants[$constant_name] = $const;
        }
    }
}
