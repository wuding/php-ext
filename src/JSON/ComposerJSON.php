<?php

/**
 * composer.json 读写
 */

namespace Ext\JSON;

use Ext\JSON;

class ComposerJSON extends JSON
{
    public static $vendorDir = '';

    /**
     * 构建函数
     */
    public function __construct($filename = null)
    {
        parent::__construct($filename);
    }

    /**
     * autoload
     */
    public static function getAutoload($dev = null)
    {
        if (!$dev) {
            return parent::$json_decoded->autoload;
        }
        return $notation = parent::$json_decoded->{'autoload-dev'} ?? null;
    }

    /**
     * PSR 4
     */
    public static function getPsr4($dev = null, $format = false)
    {
        $autoload = self::getAutoload($dev);
        $notation = $autoload->{'psr-4'} ?? null;
        return (array) $array = $format ? self::getKeyValue($notation) : $notation;
    }

    /**
     * PSR 0
     */
    public static function getPsr0($dev = null)
    {
        $autoload = self::getAutoload($dev);
        return (array) $autoload->{'psr-0'};
    }

    /**
     * files
     */
    public static function getFiles($dev = null, $format = true)
    {
        $autoload = self::getAutoload($dev);
        $notation = $autoload->{'files'} ?? null;
        return (array) $array = $format ? self::geTKeyValue($notation) : $notation;
    }

    /**
     * classmap
     */
    public static function getClassmap($dev = null)
    {
        $autoload = self::getAutoload($dev);
        return (array) $autoload->{'classmap'};
    }

    /**
     * reset value path
     */
    public static function getKeyValue($array = [])
    {
        foreach ($array as $key => &$value) {
            $value = trim($value, '/');
            if (!preg_match('/:/', $value)) {
                $value = self::$vendorDir . $value;
            }
            $value = str_replace('\\', '/', $value);
        }
        return $array;
    }

    /**
     * setting vendorDir
     */
    public static function setVendorDir($vendorDir = null)
    {
        if ($vendorDir) {
            $vendorDir .= '/';
        }
        $vendorDir = str_replace('\\', '/', $vendorDir);
        self::$vendorDir = $vendorDir;
    }

    /**
     * set super vars
     */
    public static function setSuperVars()
    {
        global $ANFORA_FILE, $ANFORA_RULE;
        $ANFORA_FILE = self::getFiles();
        $ANFORA_RULE = self::getPsr4(0, true);
    }
}