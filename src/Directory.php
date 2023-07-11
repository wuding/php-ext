<?php

namespace Ext;

class Directory extends _Abstract
{
    const VERSION = '23.7.11';
    const REVISION = 2;

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
