<?php

/**
 * 语言结构
 */

namespace Ext;

class Langref
{
    private static $types = []; //类型

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

    public function goto()
    {

    }
}