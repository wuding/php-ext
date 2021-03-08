<?php

/**
 * 需求：PHP 8.0
 */
namespace Ext;

// 异常：为什么 File 不行
use File;
use ZipArchive;

class Zip extends _Twins
{
    const VERSION = '20.433.1432';

    // 运行时
    public static $zip = null;
    public static $open = null;
    public static $result = array(
        'string' => null,
    );

    public function __construct()
    {
        self::$zip = new ZipArchive;#var_dump(self::$zip);
    }

    public static function __callStatic($name = null, $arguments = array())
    {
        return call_user_func_array(array(self::$zip, $name), $arguments);
    }

    public static function open($filename = null, $flags = ZipArchive::CREATE)
    {
        return self::$open = self::$zip->open($filename, $flags);
    }

    public static function addFromString($name = null, $content = null, $flags = ZipArchive::FL_OVERWRITE)
    {
        return self::$result['string'] = self::$zip->addFromString($name, $content, $flags);
    }

    public static function putContents($filename = null, $data = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            print_r([__FILE__, __LINE__, $filename]);
            exit;
        }
        $zipfile = substr($filename, 0, $pos);
        $file = substr($filename, $pos + 2);
        $dir = \Ext\File::isDir(dirname($zipfile));
        $open = self::open($zipfile);
        $str = self::addFromString($file, $data);
        return $str;
    }

    public static function getContents($filename = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            print_r([__FILE__, __LINE__, $filename]);
            exit;
        }
        $zipfile = substr($filename, 0, $pos);
        $file = substr($filename, $pos + 2);
        $dir = \Ext\File::isDir(dirname($zipfile));
        $open = self::open($zipfile);
        $str = self::getFromName($file);
        return $str;
    }
}
