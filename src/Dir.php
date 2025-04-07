<?php

namespace Ext;

class Dir
{
    const VERSION = 25.0204;
    const REVISION = 1;

    static $args = [
        'scandir' => [
            'directory' => ['string'],
            'sorting_order' => ['int', SCANDIR_SORT_ASCENDING],
            'context' => ['resource', null],
        ],
    ];

    function __construct()
    {

    }

    function scandir()
    {
        $variable = self::$args[__FUNCTION__];
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
        $args = func_get_args();
        $var_array = array_shift($args);
        // extract($var_array);
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
        $param_arr = array_merge($arg1, $var_array);
        if (is_null($param_arr['context'])) {
            unset($param_arr['context']);
        }
        $scandir = call_user_func_array('scandir', $param_arr);
        $arr = [];
        $dir = $file = $link = [];
        foreach ($scandir as $key => $value) {
            $filename = $param_arr['directory'] .'/'. $value;
            $is_dir = is_dir($filename);
            $is_file = is_file($filename);
            $is_link = is_link($filename);
            if ($is_dir) {
                if (in_array($value, ['.', '..'])) {
                    continue;
                }
                $dir[] = $value;
            }
            if ($is_file) {
                $file[] = $value;
            }
            if ($is_link) {
                $target = readlink($filename);
                $linkinfo = linkinfo($filename);
                $link[] = [$value, $target, $linkinfo];
            }
        }
        return $dir;
        var_dump(get_defined_vars());
        // scandir(directory)
    }
}
