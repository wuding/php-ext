<?php

class Ext
{
    const VERSION = '20.196.1902';
}

function ext($library)
{
    $arr = is_string($library) ? [$library] : $library;
    $prefix = (PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '';
    $suffix = '.' . PHP_SHLIB_SUFFIX;
    $result = [];
    foreach ($arr as $name) {
        if (!extension_loaded($name)) {
            if (!function_exists('dl')) {
                print_r([__FILE__, __LINE__, "Call to undefined function dl($name)"]);
                exit;
            }
            $basename = $prefix . $name . $suffix;
            $result[$name] = dl($basename);
        }
    }
    return $result;
}
