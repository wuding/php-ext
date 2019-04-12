<?php

/**
 * composer.json 读写
 */

namespace Ext\JSON;

use Ext\JSON;

class ComposerJSON extends JSON
{
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
        if ($dev) {
            return self::$json_decoded->autoload;
        }
        return self::$josn_decoded->{'autoload-dev'};
    }

    /**
     * PSR 4
     */
    public static function getPsr4($dev = null)
    {
        $autoload = self::getAutoload($dev);
        return (array) $autoload->{'psr-4'};
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
    public static function getFiles($dev = null)
    {
        $autoload = self::getAutoload($dev);
        return (array) $autoload->{'files'};
    }

    /**
     * classmap
     */
    public static function getClassmap($dev = null)
    {
        $autoload = self::getAutoload($dev);
        return (array) $autoload->{'classmap'};
    }
}