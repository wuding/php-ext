<?php

namespace Ext;

use ZipArchive;

class ZipV2
{
    const VERSION = 24.0816;
    const REVISION = 4;

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

    public static function _init($filename = null, $only_zip = null)
    {
        if (!$filename) {
            return false;
        }

        self::$zip = new ZipArchive;
        $filenames = self::_fileNames($filename, true, $only_zip);
        if ($filenames) {
            $filename = $filenames[0];
        }

        $dirname = dirname($filename);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;
        $open = self::$zip->open($filename, $flags);
    }

    public static function _fileNames($filename, $set_property = null, $only_zip = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            if ($filename && $only_zip) {
                self::$zip_file = $filename;
                return array($filename, null);
            }

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

    public static function wrapper($filename, $glue = '::')
    {
        $pattern = "/(.*)($glue)(.*)/i";
        if (!preg_match($pattern, $filename, $matches)) {
            return false;
        }

        $matches[0] = 'zip://';
        $matches[2] = '#';
        return implode('', $matches);
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

    public static function stat($filename = null, $flags = 0)
    {
        $pos = strpos($filename, '::');
        if (false !== $pos) {

        } elseif (null !== self::$zip) {
            return self::statName($filename, $flags);

        } else {
            return null;
        }

        list($zipfile, $file) = self::_fileNames($filename, true);
        $arr = self::statName($file);
        return $arr;
    }

    public static function getNames($file = null)
    {
        if (null !== $file) {
            self::_init($file, true);
        } elseif (null === self::$zip) {
            return false;
        }

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
        if (null === $file) {
            $file = self::$file;

        } elseif (is_string($file)) {
            $pos = strpos($file, '::');
            if (false !== $pos) {
                list($zipfile, $file) = self::_fileNames($file, true);
            }

        } elseif (null === self::$zip) {
            return false;
        }

        if (is_int($file)) {
            return self::deleteIndex($file);
        }

        return self::deleteName($file);
    }
}
