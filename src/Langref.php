<?php

/**
 * 语言结构
 */

namespace Ext;

class Langref
{
    private static $types = []; //类型
    public static $params = array(
        'prefix' => null,
        'suffix' => null,
    );

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        self::$types = [
            'scalar' => ['boolean', 'integer', 'float|double', 'string'],
            'compound' => ['array', 'object', 'callable'],
            'special' => ['resource', 'NULL'],
            'pseudo' => ['mixed', 'number', 'callback|callable', 'array|object', 'void'],
        ];
    }

    /**
     * 流程控制
     */
    public function if($expr)
    {

    }

    public function else()
    {

    }

    public function elseif($condition)
    {
        # code...
    }

    public function else_if()
    {

    }

    public function endif()
    {

    }

    public function while ($expr)
    {
        # code...
    }

    public function do_while()
    {

    }

    public function for($expr1, $expr, $expr2)
    { 
        # code...
    }

    public function foreach ($variable, $key, $value)
    {
        # code...
    }

    public function break()
    {

    }

    public function continue($loop_default_value)
    {

    }

    public function switch($variable)
    {
        /*
        case 'value':
            # code...
            break;
        
        default:
            # code...
            break;
        */
    }

    public function declare($directive)
    {

    }

    public function return()
    {

    }

    public function require()
    {

    }

    public function include(array &$array, $set = ['prefix' => '', 'suffix' => ''], $reset = false)
    {
        $prefix = isset($set['prefix']) ? $set['prefix'] : '';
        $suffix = isset($set['suffix']) ? $set['suffix'] : '';
        $arr = $array;
        foreach ($arr as $key => &$value) {
            if (is_string($key)) {
                $value = $prefix . $value . $suffix;
            }
            if (null === $reset) {
                include $value;
            }
        }
        if ($reset) {
            $array = $arr;
        }
        return $arr;
        # include $filename
    }

    public function require_once()
    {

    }

    public function include_once()
    {

    }

    public static function include_more($filename, $set = ['prefix' => '', 'suffix' => ''], $reset = false, $var_array = [])
    {
        $prefix = isset($set['prefix']) && $set['prefix'] ? (self::$params['prefix'] = $set['prefix']) : self::$params['prefix'];
        $suffix = isset($set['suffix']) && $set['suffix'] ? (self::$params['suffix'] = $set['suffix']) : self::$params['suffix'];
        $suffix = $reset ? : $suffix;
        $filename = $prefix . $filename . $suffix;
        $realpath = realpath($filename);
        # echo $filename . PHP_EOL . $realpath . PHP_EOL;
        # print_r(get_defined_vars());
        # extract($var_array);
        includeOnce($realpath, $var_array);
    }

    public function goto()
    {

    }
}

function includeOnce($realpath, $var_array = [])
{
    extract($var_array);
    include_once $realpath;
    # print_r(debug_backtrace());
    # print_r(get_defined_vars());exit;
}