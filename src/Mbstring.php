<?php

namespace Ext;

class Mbstring
{
    public $str = null;
    public $string = null;
    public $from_encoding = null;
    public static $constants_string = 'MB_OVERLOAD_MAIL|MB_OVERLOAD_STRING|MB_OVERLOAD_REGEX|MB_CASE_UPPER|MB_CASE_LOWER|MB_CASE_TITLE';
    
    public function __construct($str = null, $from_encoding = null, $to_encoding = null)
    {
        parent::init();
        if ($str) {
            $this->init($str, $from_encoding, $to_encoding);
        }
    }
    
    public function init($str, $from_encoding = null, $to_encoding = 'utf-8')
    {
        // 有些时候，参数默认值并不会有效，所以还是重新检测定义
        $to_encoding = $to_encoding ? : 'utf-8';
        $this->string = $str;
        if ($from_encoding) {
            $this->from_encoding = $from_encoding;
        } else {
            $from_encoding = $this->from_encoding;
        }
        return $this->str = mb_convert_encoding($str, $to_encoding, $from_encoding);
    }
    
    /**
     * 
     *
     */
    public function preg_replace($pattern, $replace, $str = null)
    {
        if ($str) {
            $this->init($str);
        }
        
        $str = $this->str;
        return preg_replace($pattern, $replace, $str, 1);
    }

    public function checkEncoding($var = null, $encoding = mb_internal_encoding())
    {
        return mb_check_encoding($var, $encoding);
    }

    public function chr($cp, $encoding = null)
    {
        return mb_chr($cp, $encoding);
    }

    public function convertCase($str, $mode, $encoding = mb_internal_encoding())
    {
        return mb_convert_case($str, $mode, $encoding);
    }

    public function convertEncoding($str, $to_encoding, $from_encoding = mb_internal_encoding())
    {
        return mb_convert_encoding($str, $to_encoding, $from_encoding);
    }

    public function convertKana($str, $option = 'KV', $encoding = mb_internal_encoding())
    {
        return mb_convert_kana($str, $option, $encoding);
    }

    public function convertVariables($to_encoding, $from_encoding, &$vars)
    {
        return mb_convert_variables($to_encoding, $from_encoding, $vars);
    }
}
