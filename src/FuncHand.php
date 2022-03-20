<?php

namespace Ext;

class FuncHand
{
    const VERSION = '22.3.20';

    public static function callUserFuncArray($callback, $args)
    {
        $callback_value = call_user_func_array($callback, $args);
        return $callback_value;
    }
}
