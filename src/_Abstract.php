<?php

namespace Ext {

abstract class _Abstract implements _Interface
{
    const VERSION = 25.0714;
    const REVISION = 2;

    static $func = [
    ];

    static function __callStatic($name, $arguments)
    {
        return self::_call($name, $arguments);
    }

    function __construct()
    {
        // echo __METHOD__,"\n";
    }

    function __toString()
    {
        return __FILE__;
    }


/*
    method
 */

    static function _func($func, $args)
    {
        $param_arr = [];

        extract(self::_func_vartype($func));
        extract(self::_func_param($variable));
        extract(self::_func_arg_err($parameters, $default_values, $param_types, $set_types));

        $var_array = array_shift($args);
        $argv = self::_func_arg_set($args, $parameters, $default_values);

        $arg1 = array_merge($arg, $argv);#print_r(get_defined_vars());die;
        $array_merge = array_merge($arg1, $var_array);

        foreach ($parameters as $key => $value) {
            $param_arr[$key] = $array_merge[$value];
        }
        // print_r(get_defined_vars());die;
        return $param_arr;
    }

    static function _call($func, $args)
    {
        $param_arr = self::_func($func, $args);
        $value = call_user_func_array($func, $param_arr);
        return $value;
    }

/*
    function
 */

/*
    _func_*
 */

    static function _func_vartype($func)
    {
        $variable = static::$func[$func] ?? [];
        $set_types = [];

        $return_type = null;
        $values = [];
        foreach ($variable as $key => $value) {
            if (':' !== $key && '' !== $key && !is_int($key)) {
                continue;
            }

            if (':' === $key) {
                $return_type = $value;
            } elseif (is_int($key)) {
                $values[$key] = $value;
            } elseif ('' === $key) {
                $set_types = $value;
            }
            unset($variable[$key]);
        }

        return [
            'variable' => $variable,
            'set_types' => $set_types,
        ];
    }

    static function _func_param($variable)
    {
        $parameters = [];
        $default_values = [];
        $param_types = [];
        $required_params = [];

        $i = 0;
        foreach ($variable as $key => &$value) {
            $parameters[] = $key;
            $default_values[$i] = null;
            $param_types[$i] = null;
            if (is_array($value)) {
                $count = count($value);
                if (0 < $count) {
                    $param_types[$i] = $value[0];
                }
                if (1 < $count) {
                    $default_values[$i] = $value[1];
                }
            } elseif (is_string($value)) {
                $param_types[$i] = $value;
                $required_params[$i] = $value;
                $default_values[$i] = new stdClass;
            } elseif (is_object($value)) {
                $value = (array) $value;
                var_dump($value);
                die();
            } else {
                $default_values[$i] = $value;
            }
            $i++;
        }

        return [
            'parameters' => $parameters,
            'default_values' => $default_values,
            'param_types' => $param_types,
            'required_params' => $required_params,
        ];
    }

    static function _func_arg_err($parameters, $default_values, $param_types, $set_types)
    {#print_r(get_defined_vars());die;
        $arg = [];
        $err = [];

        foreach ($parameters as $key => $value) {
            $type = $param_types[$key];
            $types = explode('|', $type);
            foreach ($types as $k => &$v) {
                if ('int' === $v) {
                    $v = 'integer';
                }
            }

            $var = $default_values[$key];
            foreach ($set_types as $k => $v) {
                if ($value === $k) {
                    if ('object' === $v) {
                        if ('?' === $var) {
                            $var = new \stdClass;
                            continue;
                        }
                    }
                    $var = settype($var, $v);
                }
            }

            $gettype = gettype($var);
            if ('object' === $gettype) {
                $cls_nm = get_class($var);
                if ('Ext\stdClass' === $cls_nm) {
                    $av = $argv[$value] ?? null;
                    if (!is_null($av)) {
                        continue;
                    }

                    $err[$key] = [$value, $av, $gettype, $types];
                    $arg[$value] = $var;
                    continue;
                }
            }

            if (!in_array($gettype, $types)) {
                $err[$key] = [$value, $gettype, $types];
            }
            $arg[$value] = $var;
        }

        return [
            'arg' => $arg,
            'err' => $err,
        ];
    }

    static function _func_arg_set($args, $parameters, $default_values)
    {
        $argv = [];
        foreach ($args as $key => $value) {
            $n = $parameters[$key] ?? null;
            $val = $default_values[$key] ?? null;
            if ($n) {
                $argv[$n] = $value;
            } else {
                $argv[] = $value;
            }
        }
        return $argv;
    }
}
}


namespace NS2 {

}


namespace {

}
