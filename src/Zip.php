<?php

namespace Ext;

use ZipArchive;

class Zip extends _Abstract
{
    const VERSION = '21.9.28';

    // 运行时
    public static $zip = null;

    public function __construct()
    {
        self::$zip = new ZipArchive;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array(array(self::$zip, $name), $arguments);
    }

    public static function getContents($filename = null, $len = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            print_r([__FILE__, __LINE__, $filename]);
            exit;
        }
        list($zipfile, $file) = self::getFilenames($filename, $pos);
        $dirname = dirname($zipfile);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;
        $open = self::open($zipfile, $flags);
        $str = self::getFromName($file);
        if (false !== $str && true === $len) {
            $str = strlen($str);
        }
        return $str;
    }

    public static function putContents($filename = null, $data = null, $len = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            print_r([__FILE__, __LINE__, $filename]);
            exit;
        }
        list($zipfile, $file) = self::getFilenames($filename, $pos);
        $dirname = dirname($zipfile);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;
        $open = self::open($zipfile, $flags);
        $add = self::addFromString($file, $data);
        if (false !== $add && true === $len) {
            $add = strlen($data);
        }
        return $add;
    }

    public static function getFilenames($filename, $pos)
    {
        $zipfile = substr($filename, 0, $pos);
        $file = substr($filename, 2 + $pos);
        return array($zipfile, $file);
    }
}
