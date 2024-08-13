<?php

namespace Ext;

use ZipArchive;

class ZipV2
{
    const VERSION = 24.0814;
    const REVISION = 1;

    public static $zip = null;
    public static $zip_file = null;
    public static $file = null;
    public static $filename = null;

    public function __construct($filename = null)
    {
        $this->_init($filename);
    }

    public function __get($name)
    {
        if (null === self::$zip) {
            $this->_init(self::$filename);
        }
        return self::$zip->$name;
    }

    public function __call($name, $arguments)
    {
        if (null === self::$zip) {
            $this->_init(self::$filename);
        }
        return call_user_func_array(array(self::$zip, $name), $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        if (null === self::$zip) {
            self::_init(self::$filename);
        }
        $static = new static;
        return call_user_func_array(array($static, $name), $arguments);
    }

    public static function _init($filename = null)
    {
        if (!$filename) {
            return false;
        }

        self::$zip = new ZipArchive;
        $filenames = self::_fileNames($filename, true);
        if ($filenames) {
            $filename = $filenames[0];
        }

        $dirname = dirname($filename);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;
        $open = self::$zip->open($filename, $flags);
    }

    public static function _fileNames($filename, $set_property = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            return false;
        }

        $result = self::getFilenames($filename, $pos);
        if ($set_property) {
            self::$zip_file = $result[0];
            self::$file = $result[1];
            self::$filename = $filename;
        }
        return $result;
    }

    public static function getFilenames($filename, $pos = null)
    {
        if (null === $pos) {
            $pos = strpos($filename, '::');
            if (false === $pos) {
                print_r([__FILE__, __LINE__, $filename]);
                exit;
            }
        }
        $zipfile = substr($filename, 0, $pos);
        $file = substr($filename, 2 + $pos);
        return array($zipfile, $file);
    }

    public static function getContents($filename = null, $len = null)
    {
        list($zipfile, $file) = self::_fileNames($filename, true);
        $str = self::getFromName($file);
        if (false !== $str && true === $len) {
            $str = strlen($str);
        }
        return $str;
    }

    public static function putContents($filename = null, $data = null, $len = null)
    {
        list($zipfile, $file) = self::_fileNames($filename, true);
        $add = self::addFromString($file, $data);
        if (false !== $add && true === $len) {
            $add = strlen($data);
        }
        return $add;
    }
}

