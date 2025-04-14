<?php

namespace Ext;

class Control extends _Abstract
{
    const VERSION = 25.0104;
    const REVISION = 1;

    // 方法版本要求
    /*
    null 不执行
    true 强制执行
    false 使用替代
    */
    public static $versionLt = [
        'match' => null,
    ];

    /*
    表达式
    */

    public static function match($subject_expression = [])
    {
        $return_values = $return_value = null;
        $vc = version_compare(phpversion(), '8.0.0', '>=');
        if (false === $vc) {
            $variable = self::$versionLt['trim'];
        }
    }
}
