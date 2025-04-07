<?php

namespace Ext;

class File
{
    const VERSION = 25.0204;
    const REVISION = 1;

    static $args = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'file_put_contents' => [
            'filename' => 'string',
            'data' => 'mixed',
            'flags' => ['int', 0],
            'context' => ['?resource', null],
        ],
        'set_error_handler' => [
            'callback' => ['callable'],
            'error_levels' => ['int', E_ALL],
        ],
    ];

    static $return = [
        'file_put_contents' => 'int|false',
        'set_error_handler' => 'callable',
    ];

    static $values = [
    ];

    function _args($func, $args)
    {
        $variable = static::$args[$func];

        $a = [];
        $v = [];
        $t = [];
        $i = 0;
        foreach ($variable as $key => $value) {
            $a[] = $key;
            $v[$i] = null;
            $t[$i] = null;
            if (is_array($value)) {
                $count = count($value);
                if (0 < $count) {
                    $t[$i] = $value[0];
                }
                if (1 < $count) {
                    $v[$i] = $value[1];
                }
            } elseif (is_string($value)) {
                $t[$i] = $value;
            } else {
                $v[$i] = $value;
            }
            $i++;
        }


        $var_array = array_shift($args);

        $arg = [];
        foreach ($a as $key => $value) {
            $arg[$value] = $v[$key];
        }

        $argv = [];
        foreach ($args as $key => $value) {
            $n = $a[$key];
            $val = $v[$key];
            $argv[$n] = $value;
        }

        $arg1 = array_merge($arg, $argv);
        return $param_arr = array_merge($arg1, $var_array);
    }

    function _call($func, $args)
    {
        $param_arr = $this->_args($func, $args);
        return call_user_func_array($func, $param_arr);
    }

    /*
    +---------------------------------------------------------------+
    + 读写操作
    +---------------------------------------------------------------+
    */

    function file_put_contents()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
}
