<?php

/**
 * 字符串函数类
 */

namespace Ext;

class Strings
{
    public static $str;

    /**
     * 构建函数
     */
    public function __construct($str = null)
    {
        $this->init($str);
    }

    /**
     * 初始化
     */
    public function init($str = null)
    {
        self::$str = $str;
    }

    /**
     * 子字符替换
     */
    public static function replace(mixed $search, mixed $replace, mixed $subject, int &$count) : mixed
    {
        return str_replace($search, $replace, $subject, $count);
    }

    /**
     * 计算一个字符串的这 md5 散列值
     */
    public static function md5(string $str, bool $raw_output = false)
    {
        return md5($str, $raw_output);
    }

    /**
     * 查找字符串首次出现的位置
     *
     * @param $haystack     在该字符串中进行查找
     * @param $needle       字符串或顺序值
     * @param $offset       
     */
    public static function strpos(string $haystack, mixed $needle, int $offset = 0) : int
    {
        return strpos($haystack, $needle, $offset);
    }
}