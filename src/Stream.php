<?php

namespace Ext;

class Stream
{
    const VERSION = 24.0816;
    const REVISION = 1;

    public static $content = null;
    public static $content_md5 = null;
    public static $lines = array();
    public static $line_total = null;
    public static $line_current = -1;
    public static $line_pattern = array(
        '/\n/',
    );

    public function __construct($str = null)
    {
        $this->init($str);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this, $name), $arguments);
    }

    public static function init($str = null)
    {
        if (!$str) {
            return false;
        }

        self::$content = $str;
        self::$content_md5 = md5($str);
    }

    public static function initLines($str = null)
    {
        self::init($str);

        if (!self::$content) {
            return false;
        }

        if (null === self::$line_total) {
            $variable = self::$line_pattern;
            foreach ($variable as $pattern) {
                $lines = preg_split($pattern, self::$content);
                if (is_array($lines)) {
                    self::$lines = $lines;
                    self::$line_total = count($lines);
                    self::$line_current = -1;
                    break;
                }
            }
        }
    }

    public static function getLine()
    {
        if (null === self::$line_total) {
            self::initLines();
        }

        self::$line_current++;
        if (self::$line_current >= self::$line_total) {
            return null;
        }

        $line = self::$lines[self::$line_current] ?? null;
        return $line;
    }

    public static function getLines($str = null)
    {
        if (null === self::$line_total) {
            self::initLines($str);
        }

        $md5 = md5($str);
        if (self::$content_md5 && $md5 !== self::$content_md5) {
            self::initLines($str);
        }

        $lines = self::$lines;
        return $lines;
    }
}
