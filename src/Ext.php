<?php

class Ext
{

}

function ext($library)
{
    $arr = is_string($library) ? [$library] : $library;
    $prefix = (PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '';
    $suffix = '.' . PHP_SHLIB_SUFFIX;
    $result = [];
    foreah ($arr as $name) {
        if (!extension_loaded($name)) {
            $basename = $prefix . $name . $suffix;
            $result[$name] = dl($basename);
        }
    }
    return $result;
}
