<?php

namespace Ext;

class Info extends _Abstract
{
    const VERSION = 20.2680870;

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
}
