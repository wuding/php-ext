<?php

namespace Ext;

class Str extends _Abstract
{
    const VERSION = '23.7.18';
    const EDITION = array(
        4,
        1,
        0,
        0,
    );
    const REVISION = 4;

    public static $constStr = 'CRYPT=SALT_LENGTH,STD_DES,EXT_DES,MD5,BLOWFISH;';

    // 方法默认值
    public static $args = [
        'chunkSplit' => [null, 76, "\r\n"],
    ];

    // 默认参数值
    public static $string = null;

    public function __construct($string = null)
    {
        parent::__construct();
        static::$string = $string;
    }

    /*
    +---------------------------------------------+
    + 转义
    +---------------------------------------------+
    */

    public static function addCSlashes($str = null, $charlist = null)
    {
        return addcslashes($str, $charlist);
    }

    public static function addSlashes($str = null)
    {
        return addslashes($str);
    }

    public static function quoteMeta($str = null)
    {
        return quotemeta($str);
    }

    public static function stripCSlashes($str = null)
    {
        return stripcslashes($str);
    }

    public static function stripSlashes($str = null)
    {
        return stripslashes($str);
    }

    /*
    +---------------------------------------------+
    + 进制
    +---------------------------------------------+
    */

    public static function bin2Hex($str = null)
    {
        return bin2hex($str);
    }

    public static function hex2Bin($data = null)
    {
        return hex2bin($data);
    }

    /*
    +---------------------------------------------+
    + 修剪
    +---------------------------------------------+
    */

    public static function trim($str = null, $character_mask = null)
    {
        if (null === $character_mask) {
            return trim($str);
        }
        return trim($str, $character_mask);
    }

    public static function lTrim($str = null, $character_mask = null)
    {
        if (null === $character_mask) {
            return ltrim($str);
        }
        return ltrim($str, $character_mask);
    }

    public static function rTrim($str = null, $character_mask = null)
    {
        if (null === $character_mask) {
            return rtrim($str);
        }
        return rtrim($str, $character_mask);
    }

    /*
    +---------------------------------------------+
    + ASCII、字符集
    +---------------------------------------------+
    */

    public static function chr($bytevalue = null)
    {
        return chr($bytevalue);
    }

    public static function ord($string = null)
    {
        return ord($string);
    }

    public static function convertCyr($str = null, $from = null, $to = null)
    {
        return convert_cyr_string($str, $from, $to);
    }

    public static function hebreV($hebrew_text = null, $max_chars_per_line = 0)
    {
        return hebrev($hebrew_text, $max_chars_per_line);
    }

    public static function hebreVC($hebrew_text = null, $max_chars_per_line = 0)
    {
        return hebrevc($hebrew_text, $max_chars_per_line);
    }

    /*
    +---------------------------------------------+
    + 分割、合并、填充
    +---------------------------------------------+
    */

    /**
     * 问题：中文乱码
     */
    public static function chunkSplit($body = null, $chunklen = null, $end = null)
    {
        if (static::$defaultValue) {
            list($body, $chunklen, $end) = static::args(__FUNCTION__, func_get_args());
        }

        if (null === $chunklen) {
            if (null === $end) {
                return chunk_split($body);
            }
            $chunklen = 76;
        } elseif (null === $end) {
            $end = "\r\n";
            return chunk_split($body, $chunklen);
        }
        return chunk_split($body, $chunklen, $end);
    }

    public static function explode($delimiter = null, $string = null, $limit = PHP_INT_MAX)
    {
        $string = null === $string ? static::$string : $string;
        return explode($delimiter, $string, $limit);
    }

    public static function split($string, $length = 1)
    {
        $return_values = str_split($string, $length);
    }
    //: array

    /*
    +---------------------------------------------+
    + 编码解码
    +---------------------------------------------+
    */

    public static function uuDecode($data = null)
    {
        return convert_uudecode($data);
    }

    public static function uuEncode($data = null)
    {
        return convert_uuencode($data);
    }

    /*
    +---------------------------------------------+
    + 计数、位置、比较
    +---------------------------------------------+
    */

    public static function countChars($string = null, $mode = 0)
    {
        return count_chars($string, $mode);
    }

    public static function str_word_count()
    {
        return null;
    }

    public static function substr_count()
    {
        return null;
    }

    public static function levenshtein()
    {
        return null;
    }

    public static function similar_text()
    {
        return null;
    }

    public static function strcmp()
    {
        return null;
    }

    public static function strcasecmp()
    {
        return null;
    }

    public static function strnatcmp()
    {
        return null;
    }

    public static function strnatcasecmp()
    {
        return null;
    }

    public static function strncmp()
    {
        return null;
    }

    public static function substr_compare()
    {
        return null;
    }

    public static function strcoll()
    {
        return null;
    }

    public static function strspn()
    {
        return null;
    }

    // Bad
    public static function strCSPN($string, $characters, $offset = 0, $length = null)
    {
        $return_values = strcspn($string, $characters, $offset, $length);
        return $return_values;
    }
    //: int

    public static function strlen()
    {
        return null;
    }

    /*
    +---------------------------------------------+
    + 散列值
    +---------------------------------------------+
    */

    public static function crc32($str = null)
    {
        return crc32($str);
    }

    public static function crypt($str = null, $salt = null)
    {
        $str = null === $str ? static::$string : $str;
        if (null === $salt) {
            return crypt($str);
        }
        return crypt($str, $salt);
    }

    /*
    +---------------------------------------------+
    + 语言结构
    +---------------------------------------------+
    */

    public static function echo()
    {
        $str = implode('', func_get_args());
        echo $str;
        return $str;
    }

    /*
    +---------------------------------------------+
    + 格式化
    +---------------------------------------------+
    */

    public static function fPrintF($handle = null, $format = null)
    {
        $param_arr = func_get_args();
        return call_user_func_array('fprintf', $param_arr);
    }

    /*
    +---------------------------------------------+
    + HTML
    +---------------------------------------------+
    */

    public static function getHtmlTranslationTable($table = HTML_SPECIALCHARS, $flags = ENT_COMPAT | ENT_HTML401, $encoding = 'UTF-8')
    {
        return get_html_translation_table($table, $flags, $encoding);
    }

    /*
    +---------------------------------------------------------------+
    + 大小写
    +---------------------------------------------------------------+
    */

    public static function lcFirst($string)
    {
        $mb_strlen = mb_strlen($string);
        if (1 === $mb_strlen) {
            $mb_ord = mb_ord($string);
            if (90  < $mb_ord) {
                return $string;
            }
        }

        $return_values = lcfirst($string);
        return $return_values;
    }

    public static function ucFirst($string)
    {
        $mb_strlen = mb_strlen($string);
        if (1 === $mb_strlen) {
            $mb_ord = mb_ord($string);
            if (122  < $mb_ord) {
                return $string;
            }
        }

        $return_values = ucfirst($string);
        return $return_values;
    }

    public static function strToLower()
    {

    }

    public static function strToUpper()
    {

    }

    public static function ucWords($string)
    {
        $mb_strlen = mb_strlen($string);
        if (1 === $mb_strlen) {
            $mb_ord = mb_ord($string);
            if (122  < $mb_ord) {
                return $string;
            }
        }

        $return_values = ucwords($string);
        return $return_values;
    }
}
