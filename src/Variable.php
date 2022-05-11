<?php

namespace Ext;

class Variable
{
    const VERSION = '22.4.28';

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

    public $pages = array(
        'refman' => array(
            'is_null' => array(
                'verinfo' => array('>=' => '4.0.4', 5, 7, 8),
                'purpose' => 'Finds whether a variable is null',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'is_null(mixed $value): bool',
                        ),
                    ),
                    'Parameters' => array(
                        'value' => null,
                    ),
                    'Return Values' => array(
                        true => 'if value is null',
                        false => 'otherwise',
                    ),
                    'Examples' => array(
                        'is_null() example',
                    ),
                    'See Also' => array(
                        'The null type',
                        'isset()',
                        'is_bool()',
                        'is_numeric()',
                        'is_float()',
                        'is_int()',
                        'is_string()',
                        'is_object()',
                        'is_array()',
                    ),
                ),
            ),
            'unset' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Unset a given variable',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'unset(mixed $var, mixed ...$vars): void',
                        ),
                    ),
                    'Parameters' => array(
                        'var' => null,
                        'vars' => null,
                    ),
                    'Return Values' => array(
                        'No value is returned',
                    ),
                    'Examples' => array(
                        'unset() example',
                        'Using ( unset ) casting',
                    ),
                    'Notes' => array(
                        'Because this is a language construct and not a function, it cannot be called using variable functions, or named arguments.',
                        'It is possible to unset even object properties visible in current context.',
                        'It is not possible to unset $this inside an object method.',
                        'When using unset() on inaccessible object properties, the __unset() overloading method will be called, if declared.',
                    ),
                    'See Also' => array(
                        'isset()' => 'Determine if a variable is declared and is different than null',
                        'empty()' => 'Determine whether a variable is empty',
                        '__unset()',
                        'array_splice' => 'Remove a portion of the array and replace it with something else',
                        '(unset) casting',
                    ),
                ),
            ),
            'isset' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Determine if a variable is declared and is different than null',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'isset(mixed $var, mixed ...$vars): bool',
                        ),
                    ),
                    'Parameters' => array(
                        'var' => null,
                        'vars' => null,
                    ),
                    'Return Values' => array(
                        'Return true if var exists and has any value other than null. false otherwise.',
                    ),
                    'Examples' => array(
                        'isset() Examples',
                        'isset() on String Offsets'
                    ),
                    'Notes' => array(
                        'isset() only works with variables as passing anything else will result in a parse error. For checking if constants are set use the defined() function',
                        'Because this is a language construct and not a function, it cannot be called using variable functions, or declared.',
                        'When using isset() on inaccessible object properties, the __isset() overloading method will be called, if declared.',
                    ),
                    'See Also' => array(
                        'empty()' => 'Determine whether a variable is empty',
                        '__isset()',
                        'unset()' => 'Unset a given variable',
                        'defiend()' => 'Checks whether a given named constant exists',
                        'the type comparison tables',
                        'array_key_exists()' => 'Checks if the given key or index exists in the array',
                        'is_null()' => 'Finds whether a variable is null',
                        'the error control @ operator',
                    ),
                ),
            ),
            'empty' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Determine whether a variable is empty',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'empty(mixd $var): bool',
                        ),
                    ),
                    'Parameters' => array(
                        'var' => null,
                    ),
                    'Return Values' => array(
                        false => 'if var exists and has a non-empty, non-zero value',
                        true => 'Otherwise returns',
                    ),
                    'Examples' => array(
                        'A simple empty() / isset() comparison',
                        'empty() on String Offsets',
                    ),
                    'Notes' => array(
                        'Because this is a language construct and not a function, it cannot be called using variable functions, or named arguments.',
                        'When using empty() on inaccessible object properties, the __isset() overloading method will be called, if declared.',
                    ),
                    'See Also' => array(
                        'conversion to boolean',
                        'isset()' => 'Determine if a variable is declared and is different than null',
                        '__isset()',
                        'unset()' => 'Unset a given variable',
                        'array_key_exists()' => 'Checks if the given key or index exists in the array',
                        'count()' => 'Counts all elements in an aaray or in a Countable object',
                        'strlen()' => 'Get string length',
                        'The type comparison tables',
                    ),
                ),
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

    /*
     * 计数器
     *
     */
    public static function dump()
    {
        $function = 'var_dump';
        $param_arr = func_get_args();
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }


    /*
     * 自己
     *
     */

    public static function export($value, bool $return = false): ?string
    {
        $return_values = var_export($value, $return);
        return $return_values;
    }


    /*
     * 可见光，不可见光
     *
     */

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


    /*
    +---------------------------------------------------------------+
    + 检测
    +---------------------------------------------------------------+
    */

    public static function isNull($value, $options = null)
    {
        $return_values = is_null($value);
        return $return_values;
    }


    /*
    +---------------------------------------------------------------+
    + 返回定义数组或销毁
    +---------------------------------------------------------------+
    */

    public static function unSet($var, $variable)
    {
        foreach ($variable as $key) {
            unset($var[$key]);
        }
        return $var;
    }

    /*
    +---------------------------------------------------------------+
    + 检测
    +---------------------------------------------------------------+
    */

    public static function isSet($var, $variable)
    {
        $arr = array();
        foreach ($variable as $key) {
            $return_values = isset($var[$key]);
            $value = $var[$key] ?? null;
            $origin_values = (object) $value;
            $arr[$key] = false === $return_values ? false : $origin_values;
        }
        return $arr;
    }

    public static function empty($var)
    {

    }
}
