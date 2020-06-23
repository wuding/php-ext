<?php

namespace Ext;

class _Abstract
{
    public static $constants = array();
    public static $constPrefix = null;
    public static $constStr = null;
    public static $fp = null;

    public static function init()
    {
        $arr = preg_split('/[|,]+/', self::$constStr);
        foreach ($arr as $name) {
            if (!$name) {
               continue 1;
            }

            if (self::$constPrefix) {
                $name = self::$constPrefix .'_'. $name;
            }
            self::$constants[$name] = constant($name);
        }
        return self::$constants;
    }

    public static function getHandle($handle = null, $varName = 'fp')
    {
        return $handle ?: self::$$varName;
    }

    public static function setHandle($handle = null, $varName = 'fp')
    {
        if ($handle) {
            self::$$varName = $handle;
        }
        return false;
    }
}
