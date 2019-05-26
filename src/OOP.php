<?php

/**
 * 面向对象程序设计
 */

namespace Ext;

class OOP
{
    public function __construct()
    {

    }

    /**
     * Property Overloading
     */
    public function __set($name, $value)
    {

    }

    public function __get($name)
    {

    }

    public function __isset($name)
    {

    }

    public function __unset($name)
    {
        
    }

    /**
     * Method Overloading
     */
    public function __call($name, $arguments)
    {

    }

    public static function __callStatic($name, $arguments)
    {
        $methodName = ucwords(str_replace('_', ' ', $name));
        $methodName = str_replace(' ', '', lcfirst($methodName));
        $instance = new static;
        return $instance->$methodName(implode(', ', $arguments));
    }
}