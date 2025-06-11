<?php

namespace Ext;

class Directory extends _Abstract
{
    const VERSION = 25.0611;
    const REVISION = 3;
    const EDITION = 182637.1746959197;

    public static $predefined_constants = array(
        /* string */
        'DIRECTORY_SEPARATOR',
        'PATH_SEPARATOR',

        /* scan() int */
        'SCANDIR_SORT_ASCENDING',
        'SCANDIR_SORT_DESCENDING',
        'SCANDIR_SORT_NONE',
    );


    /*
    +---------------------------------------+
    + list
    +---------------------------------------+
    */

    static function dir($directory, $context = null, $options = [])
    {
        $excepts = array('.', '..');
        $array_filter_callback = null;
        extract($options);
        $dir = dir($directory);
        $arr = [
            '' => $dir
        ];
        while (false !== ($entry = $dir->read())) {
            $arr[] = $entry;
        }
        if ($array_filter_callback) {
            $arr = array_filter($arr, $array_filter_callback);
        }
        return $arr;
    }
    //: Directory|false

    public static function scan($directory, $sorting_order = SCANDIR_SORT_ASCENDING, $context = null, $options = array())
    {
        $excepts = array('.', '..');
        $array_filter_callback = null;
        extract($options);

        $result_values = $directories = scandir($directory, $sorting_order);

        if ($array_filter_callback) {
            $result_values = array_filter($directories, $array_filter_callback);
        }

        return $result_values;
    }
    //: array or false

}
