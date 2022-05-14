<?php

namespace Ext;

class Json
{
    const VERSION = '22.5.14';

    public function __construct()
    {

    }

    /*
    +---------------------------------------------------------------+
    + Unicode
    +---------------------------------------------------------------+
    */

    /**
     * Unicode 解码
     */
    public static function unicodeDecode($str)
    {
        $json = "{str:\"$str\"}";
        $obj = json_decode($json);
        if (!$obj) {
            print_r(['json decode is null', $obj, $str, __FILE__, __LINE__]);
            exit;
        }
        return $obj->str;
    }

    /**
     * Unicode 编码
     */
    public static function unicodeEncode($subject)
    {
        $in_charset = 'UTF-8';
        $out_charset = 'UCS-4';
        $frombase = 16;
        $tobase = 10;
        $pieces = [];
        $preg = preg_match_all('/./u', $subject, $matches);
        foreach ($matches[0] as $char) {
            $str = iconv($in_charset, $out_charset, $char);
            $number = bin2hex($str);
            $dec = base_convert($number, $frombase, $tobase);
            $pieces[] = $dec;
        }
        $str = implode(';&#', $pieces);
        $string = "&#$str;";
        return $string;
    }

}
