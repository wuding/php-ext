<?php

namespace Ext;

class Variable
{
    const VERSION = '22.3.21';

    public static $return_values = array(
        'var_export' => array(
            'Returns the variable representation' => true,
            null => 'Otherwise',
        ),

    );

    public static $parameters = array(
        'pRvDvEdZvalD' => array(
            'func_n' => array(
                0 => 'dump',
                1 => 'export',
                2 => 'printReadable',
                3 => 'debugZvalDump',
                'var_dump' => 'dump',
                'var_export' => 'export',
                'print_r' => 'printReadable',
                'debug_zval_dump' => 'debugZvalDump',
            ),
        ),
    );

    public static function _function_name($var)
    {
        $return_values = $var;
        if (is_numeric($var) || preg_match("/_/", $var)) {
            $return_values = self::$parameters['pRvDvEdZvalD']['func_n'][$var] ?? 0;
        }
        return $return_values;
    }

    /*
    +---------------------------------------------------------------+
    + 打印信息表示
    +---------------------------------------------------------------+
    */

    public static function dump()
    {
        $function = 'var_dump';
        $param_arr = func_get_args();
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }

    public static function export($value, bool $return = false): ?string
    {
        $return_values = var_export($value, $return);
        return $return_values;
    }

    public static function printReadable($value, bool $return = false)
    {
        $return_values = print_r($value, $return);
        return $return_values;
    }

    public static function debugZvalDump()
    {
        $function = 'debug_zval_dump';
        $param_arr = func_get_args();
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }

    public static function pRvDvEdZvalD($func_n = 0, $param_arr)
    {
        $function = self::_function_name($func_n);
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }
}
