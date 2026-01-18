<?php

namespace Ext;

class Json
{
    const REVISION = 3;
    const VERSION = 26.0118;
    static $predefined_constants = array(
        /* json_last_error() JsonException */
        'JSON_ERROR_NONE',
        'JSON_ERROR_DEPTH',
        'JSON_ERROR_STATE_MISMATCH',
        'JSON_ERROR_CTRL_CHAR',
        'JSON_ERROR_SYNTAX',
        'JSON_ERROR_UTF8',
        'JSON_ERROR_RECURSION',
        'JSON_ERROR_INF_OR_NAN',
        'JSON_ERROR_UNSUPPORTED_TYPE',
        'JSON_ERROR_INVALID_PROPERTY_NAME',
        'JSON_ERROR_UTF16',
        'JSON_ERROR_NON_BACKED_ENUM',

        /* json_decode */
        'JSON_BIGINT_AS_STRING',
        'JSON_OBJECT_AS_ARRAY',

        /* json_encode */
        'JSON_HEX_TAG',
        'JSON_HEX_AMP',
        'JSON_HEX_APOS',
        'JSON_HEX_QUOT',
        'JSON_FORCE_OBJECT',
        'JSON_NUMERIC_CHECK',
        'JSON_PERTTY_PRINT',
        'JSON_UNESCAPED_SLASHES',
        'JSON_UNESCAPED_UNICOEE',
        'JSON_PARTIAL_OUTPUT_ON_ERROR',
        'JSON_PRESERVE_ZERO_FRACTION',
        'JSON_UNESCAPED_LINE_TERMINATORS',

        /* json_decode json_encode */
        'JSON_INVALID_UTF8_IGNORE',
        'JSON_INVALID_UTF8_SUBSTITUTE',
        'JSON_THROW_ON_ERROR',
    );

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
