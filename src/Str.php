<?php

namespace Ext;

class Str extends _Abstract
{
    const VERSION = 25.1119;
    const REVISION = 2;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'nl2br' => [
            'string' => 'string',
            'use_xhtml' => ['bool', true],
            ':' => 'string',
        ],
        'set_error_handler' => [
            'callback' => ['callable'],
            'error_levels' => ['int', E_ALL],
        ],
    ];

    // 1. 编码解码
    static function convert_uudecode(){}
    static function convert_uuencode(){}
    static function metaphone(){}
    static function quoted_printable_decode(){}
    static function quoted_printable_encode(){}
    static function soundex(){}
    // Deprecated
    static function utf8_decode(){}
    static function utf8_encode(){}

    // 1.2 转义
    static function addcslashes(){}
    static function addslashes(){}
    static function quotemeta(){}
    static function stripcslashes(){}
    static function stripslashes(){}

    // 1.3 进制
    static function bin2hex(){}
    static function hex2bin(){}

    // 1.4 散列值
    static function crc32(){}
    static function md5(){}
    static function md5_file(){}
    static function sha1(){}
    static function sha1_file(){}

    // 1.5 HTML
    static function get_html_translation_table(){}
    static function html_entity_decode(){}
    static function htmlentities(){}
    static function htmlspecialchars(){}
    static function htmlspecialchars_decode(){}
    static function nl2br()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
    static function strip_tags(){}

    // 2. 格式化
    static function fprintf(){}
    static function number_format(){}
    static function printf(){}
    static function sprintf(){}
    static function sscanf(){}
    static function vfprintf(){}
    static function vprintf(){}
    static function vsprintf(){}

    // 2.2 修剪
    static function ltrim(){}
    static function rtrim(){}
    static function trim(){}

    // 2.3 大小写
    static function lcfirst(){}
    static function strtolower(){}
    static function strtoupper(){}
    static function ucfirst(){}
    static function ucwords(){}

    // 2.4 本地化
    static function localeconv(){}
    static function nl_langinfo(){}
    static function setlocale(){}
    // Deprecated
    static function money_format(){}

    // 3. ASCII 字符集
    static function chr(){}
    static function crypt(){}
    static function hebrev(){}
    static function ord(){}
    static function str_decrement(){}
    static function str_increment(){}
    // Deprecated
    static function convert_cyr_string(){}
    static function hebrevc(){}

    // 4. 分割 合并 填充
    static function chunk_split(){}
    static function explode(){}
    static function implode(){}
    static function str_pad(){}
    static function str_repeat(){}
    static function str_shuffle(){}
    static function str_split(){}
    static function strtok(){}
    static function wordwrap(){}

    // 5. 计数 位置 比较
    static function count_chars(){}
    static function levenshtein(){}
    static function similar_text(){}
    static function str_word_count(){}
    static function strcmp(){}
    static function strcoll(){}
    static function strcspn(){}
    static function strnatcasecmp(){}
    static function strnatcmp(){}
    static function strncasecmp(){}
    static function strncmp(){}
    static function strspn(){}
    static function substr_compare(){}
    static function substr_count(){}

    // 6. 语言结构
    static function echo(){}
    static function print(){}

    // 7. 解析 查找 替换
    static function parse_str(){}
    static function str_contains(){}
    static function str_ends_with(){}
    static function str_getcsv(){}
    static function str_ireplace(){}
    static function str_replace(){}
    static function str_rot13(){}
    static function str_starts_with(){}
    static function strcasecmp(){}
    static function stripos(){}
    static function stristr(){}
    static function strlen(){}
    static function strpbrk(){}
    static function strpos(){}
    static function strrchr(){}
    static function strrev(){}
    static function strripos(){}
    static function strrpos(){}
    static function strstr(){}
    static function strtr(){}
    static function substr(){}
    static function substr_replace(){}
}
