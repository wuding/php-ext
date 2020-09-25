<?php

namespace Ext;

class Filesystem
{
    const VERSION = 20.2420642;

    // 参数
    public static $filename = null;
    public static $mode = null;
    public static $use_include_path = null;
    public static $context = null;

    public static $reset = null; // 重设参数值

    // 运行时
    public static $handle = null; // 缺省键
    public static $last = null; // 最后设置的键
    public static $instances = [];
    public static $dbh = null; // 最后连接的

    public function __construct($filename, $mode, $use_include_path = false, $context = null)
    {
        self::open($filename, $mode, $use_include_path, $context);
    }

    public static function open($filename, $mode, $use_include_path = false, $context = null)
    {
        $vars = get_defined_vars();
        $arr = [];
        foreach ($vars as $k => $v) {
            $arr[$k] = null === $v ? self::$$k : $v;
            if (false !== self::$reset) {
                if (true === self::$reset) {
                    self::$$k = $v;
                } elseif (null !== $v) {
                    self::$$k = $v;
                }
            }
        }
        extract($arr);
        $json = json_encode($arr);
        self::$last = self::$handle = $key = md5($json);
        if (array_key_exists($key, self::$instances)) {
            return self::$instances[$key];
        }
        return self::$instances[$key] = fopen($filename, $mode, $use_include_path, $context);
    }

    public static function handle($key = null, $set_default = null)
    {
        $key = null === $key ? self::$handle : $key;
        if (array_key_exists($key, self::$instances)) {
            if ($set_default) {
                self::$handle = $key;
            }
            self::$last = $key;
            return self::$instances[$key];
        }
        print_r(["no key $key", __FILE__, __LINE__]);
    }

    public static function last($handle = null)
    {
        return $handle = null === $handle ? self::handle(self::$last) : $handle;
    }

    public static function eof($handle = null)
    {
        $handle = null === $handle ? self::handle(self::$last) : $handle;
        return feof($handle);
    }

    public static function gets($handle = null, $length = null)
    {
        $handle = null === $handle ? self::handle(self::$last) : $handle;
        return fgets($handle, $length);
    }
}
