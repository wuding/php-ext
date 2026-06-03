<?php

namespace Ext;

use ZipArchive;

class ZipV2
{
    const VERSION = 26.0511;
    const REVISION = 5;

    var $_zip = null;
    var $_zip_file = null;
    var $_file = null;
    var $_filename = null;

    static $zip_archive = [];
    static $zip = null;
    static $zip_file = null;
    static $file = null;
    static $filename = null;

    function __construct($filename = null)
    {
        $this->_init($filename);
    }

    function __get($name)
    {
        if (null === $this->_zip) {
            $this->_init($this->_filename);
        }
        return $this->_zip->$name;
    }

    function __call($name, $arguments)
    {
        if (null === $this->_zip) {
            $this->_init($this->_filename);
        }

        $call = @call_user_func_array(array($this->_zip, $name), $arguments);
        $type = gettype($call);
        if (!$call) {
            var_dump($call);
            print_r([__LINE__, __FILE__, $type, get_defined_vars()]);
        }

        return $call;
    }

    static function __callStatic($name, $arguments)
    {
        if (null === self::$zip) {
            self::_inits(self::$filename);
        }
        $static = new static;
        print_r([__LINE__, __FILE__, get_defined_vars()]);
        return call_user_func_array(array($static, $name), $arguments);
    }

    function _init($filename = null, $only_zip = null)
    {
        if (!$filename) {
            return false;
        }

        $filenames = $this->_fileNames($filename, true, $only_zip);
        if ($filenames) {
            $filename = $filenames[0];
        }

        $key = md5($filename);
        try {
            $zip = new ZipArchive;
        } catch (Exception $e) {
            print_r([__FILE__, __LINE__, $e]);
            die;
        }

        $dirname = dirname($filename);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;# | ZipArchive::OVERWRITE
        $open = $zip->open($filename, $flags);
        try {
            // self::$zip_archive[$key] = self::$zip = $zip;
            $this->_zip = $zip;
        } catch (Exception $e) {
            print_r([__FILE__, __LINE__, $e]);
            die;
        }
        return $zip;
    }

    static function _inits($filename = null, $only_zip = null)
    {
        if (!$filename) {
            return false;
        }

        $filenames = self::_fileNamess($filename, true, $only_zip);
        if ($filenames) {
            $filename = $filenames[0];
        }

        $key = md5($filename);
        try {
            $zip = new ZipArchive;
        } catch (Exception $e) {
            print_r([__FILE__, __LINE__, $e]);
            die;
        }

        $dirname = dirname($filename);
        $dir = File::isDir($dirname);
        $flags = ZipArchive::CREATE;# | ZipArchive::OVERWRITE
        $open = $zip->open($filename, $flags);
        try {
            // self::$zip_archive[$key] = self::$zip = $zip;
            self::$zip = $zip;
        } catch (Exception $e) {
            print_r([__FILE__, __LINE__, $e]);
            die;
        }
        return $zip;
    }

    function _fileNames($filename, $set_property = null, $only_zip = null)
    {
        $pos = strpos($filename, '::');
        if (false === $pos) {
            if ($filename && $only_zip) {
                $this->_zip_file = $filename;
                return array($filename, null);
            }

            return false;
        }

        $result = self::getFilenames($filename, $pos);
        if ($set_property) {
            $this->_zip_file = $result[0];
            $this->_file = $result[1];
            $this->_filename = $filename;
        }
        return $result;
    }

    static function _fileNamess($filename, $set_property = null, $only_zip = null)
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

    static function wrapper($filename, $glue = '::')
    {
        $pattern = "/(.*)($glue)(.*)/i";
        if (!preg_match($pattern, $filename, $matches)) {
            return false;
        }

        $matches[0] = 'zip://';
        $matches[2] = '#';
        return implode('', $matches);
    }

    static function getFilenames($filename, $pos = null)
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

    function getContents($filename = null, $len = null)
    {
        $zip = $this->_init($filename);
        list($zipfile, $file) = $this->_fileNames($filename, true);
        $str = $zip->getFromName($file);
        if (false !== $str && true === $len) {
            $str = strlen($str);
        }
        return $str;
    }

    function putContents($filename = null, $data = null, $len = null)
    {
        $zip = $this->_init($filename);
        list($zipfile, $file) = $this->_fileNames($filename, true);
        $add = $zip->addFromString($file, $data);
        if (false !== $add && true === $len) {
            $add = strlen($data);
        }
        return $add;
    }

    function stat($filename = null, $flags = 0)
    {
        $pos = strpos($filename, '::');
        if (false !== $pos) {

        } elseif (null !== self::$zip) {
            return $this->statName($filename, $flags);

        } else {
            return null;
        }

        list($zipfile, $file) = $this->_fileNames($filename, true);
        $arr = $this->statName($file);
        return $arr;
    }

    function getNames($file = null)
    {
        if (null !== $file) {
            $this->_init($file, true);
        } elseif (null === $this->_zip) {
            return false;
        }

        $numFiles = $this->_zip->numFiles;
        $pieces = array();
        for ($i = 0; $i < $numFiles; $i++) {
            $filename = $this->_zip->getNameIndex($i);
            $pieces[] = $filename;
        }
        return $pieces;
    }

    function del($file = null)
    {
        if (null === $file) {
            $file = $this->_file;

        } elseif (is_string($file)) {
            $pos = strpos($file, '::');
            if (false !== $pos) {
                list($zipfile, $file) = $this->_fileNames($file, true);
            }

        } elseif (null === $this->_zip) {
            return false;
        }

        if (is_int($file)) {
            return $this->deleteIndex($file);
        }
        return $this->deleteName($file);
    }
}
