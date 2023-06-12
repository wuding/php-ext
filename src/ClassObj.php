<?php

namespace Ext;

class ClassObj
{
    const VERSION = '23.6.12';

    /*
    +---------------------------------------------------------------+
    + 获取类方法
    +---------------------------------------------------------------+
    */

    public static function getClassMethods($object_or_classname)
    {
        $return_values_array = get_class_methods($object_or_classname);
        return $return_values_array;
    }
}
