<?php
namespace Ext;

class Fileinfo
{
    public static $constants = [];
    public static $finfo = null;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $string = 'NONE,SYMLINK,MIME_TYPE,MIME_ENCODING,MIME,COMPRESS,DEVICES,CONTINUE,PRESERVE_ATIME,RAW,EXTENSION';
        $arr = explode(',', $string);
        foreach ($arr as $value) {
            $name = "FILEINFO_$value";
            self::$constants[$name] = constant($name);
        }
    }

    public static function contentType($filename)
    {
        if (!Filesystem::exists($filename)) {
            return null;
        }
        return mime_content_type($filename);
    }

    public function open($options = FILEINFO_NONE, $magic_file = null)
    {
        return self::$finfo = new finfo($options, $magic_file);
    }

    public function file($file_name = null, $options = FILEINFO_NONE, $context = null)
    {
        return self::$finfo->file($file_name, $options, $context);
    }

    public function close($finfo)
    {
        return finfo_close($finfo);
    }

    public function buffer($string = null, $options = FILEINFO_NONE,  $context = null)
    {
        return self::$finfo->buffer($string, $options,  $context);
    }

    public function setFlags($options)
    {
        return self::$finfo->set_flags($options);
    }
}
