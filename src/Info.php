<?php

namespace Ext;

class Info extends _Abstract
{
    const VERSION = '23.7.15';
    const REVISION = 3;

    public static $constants = [];
    public static $constStr = 'ASSERT=ACTIVE,CALLBACK,BALL,WARNING,QUIET_EVAL;';

    /*
    +---------------------------------------------+
    + 异常
    +---------------------------------------------+
    */

    public static function assertOptions($what = null, $value = null)
    {
        return assert_options($what, $value);
    }

    /*
    +---------------------------------------------+
    + 运行时
    +---------------------------------------------+
    */

    public static function getDefinedConstants($categorize = false, $cat_name = null)
    {
        $constants = get_defined_constants($categorize);
        if (!$cat_name) {
            return $constants;
        }

        $cat_nm = strtolower($cat_name);
        foreach ($constants as $key => $value) {
            $keyname = strtolower($key);
            if ($cat_nm === $keyname) {
                return $value;
            }
        }
        return false;
    }


    /*
    +---------------------------------------------+
    + 命令行
    +---------------------------------------------+
    */

    public static function getOpt($short_options, $long_options = [], &$rest_index = null)
    {
        $return_values = getopt($short_options, $long_options, $rest_index);
        return $return_values;
    }
    //: array|false

}
