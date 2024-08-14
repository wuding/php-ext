<?php

namespace Ext;

use ZipArchive;

class Zip extends _Abstract
{
    const VERSION = 24.0814;
    const REVISION = 5;

    // 运行时
    public static $zip = null;
    public static $zip_file = null;
    public static $file = null;

    public function __construct($filename = null)
    {
        self::$zip = new ZipArchive;

        if ($filename) {
            $filenames = self::_fileNames($filename, true);
            if ($filenames) {
                $filename = $filenames[0];
            }

            $flags = ZipArchive::CREATE;
            $open = self::$zip->open($filename, $flags);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if (null === self::$zip) {
            $Zip = new static;
        }
        return call_user_func_array(array(self::$zip, $name), $arguments);
    }

    public function __get($name)
    {
        if (null === self::$zip) {
            $Zip = new static;
        }
        return self::$zip->$name;
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
        }
        return $result;
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

    public static function stat($filename = null)
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
        $str = self::statName($file);
        return $str;
    }

    public static function getNames()
    {
        $numFiles = self::$zip->numFiles;
        $pieces = array();
        for ($i = 0; $i < $numFiles; $i++) {
            $filename = self::$zip->getNameIndex($i);
            $pieces[] = $filename;
        }
        return $pieces;
    }

    public static function del($file = null)
    {
        $file = null === $file ? self::$file : $file;
        if (is_int($file)) {
            return self::deleteIndex($file);
        }
        return self::deleteName($file);
    }
}
