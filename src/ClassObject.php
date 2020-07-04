<?php
namespace Ext;

class ClassObject
{
    public function alias($original, $alias, $autoload = true)
    {
        return class_alias($original, $alias, $autoload);
    }

    public function callUserMethodArray($method_name, &$obj, $params)
    {
        return call_user_method_array($method_name, $obj, $params);
    }

    public function getCalledClass()
    {
        return get_called_class();
    }
}
