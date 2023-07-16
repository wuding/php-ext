<?php

namespace Ext;

class PCRE extends _Abstract
{
    const VERSION = '23.7.12';
    const REVISION = 5;

    public static $constStr = 'PREG=OFFSET_CAPTURE,UNMATCHED_AS_NULL,NO_ERROR,INTERNAL_ERROR,BACKTRACK_LIMIT_ERROR,RECURSION_LIMIT_ERROR,BAD_UTF8_ERROR,BAD_UTF8_OFFSET_ERROR,JIT_STACKLIMIT_ERROR,GREP_INVERT;PREG_SPLIT=NO_EMPTY,DELIM_CAPTURE,OFFSET_CAPTURE;';


    ## 分类


    ### 过滤

    public static function filter($pattern, $replacement, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_filter($pattern, $replacement, $subject, $limit, $count);
    }
    //: string|array|null


    ###

    public static function grep($pattern, $array, $flags = 0)
    {
        $return_values = preg_grep($pattern, $array, $flags);
    }
    //: array|false


    ### 错误

    // Bad
    public static function lastErrorMsg()
    {
        $return_values = preg_last_error_msg();
    }
    //: string


    // Bad
    public static function lastError()
    {
        $return_values = preg_last_error();
    }
    //: int PREG_NO_ERROR


    ### 匹配

    public static function matchAll($pattern, $subject, $matches = null, $flags = 0, $offset = 0, $options = array('if_matches' => null))
    {
        $return_values = pcre_match_all($pattern, $subject, $matches, $flags, $offset);
    }
    //: int|false


    public static function match($pattern, $subject, &$matches = null, $flags = 0, $offset = 0, $options = array('if_matches' => null))
    {
        extract($options);

        $return_values = preg_match($pattern, $subject, $matches, $flags, $offset);
        if ($if_matches && $matches)
        {

            return get_defined_vars();
        }

        return $return_values;
    }
    //: int|false


    ###


    public static function quote($str, $delimiter = null)
    {
        $return_values = preg_quote($str, $delimiter);
    }
    //: string


    ### 替换





    public static function replace($pattern, $replacement, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace($pattern, $replacement, $subject, $limit, $count);
        return $return_values;
    }
    //: string|array|null

    public static function replaceCallback($pattern, $callback, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace_callback($pattern, $callback, $subject, $limit, $count);
        return $return_values;
    }
    //: string|array|null

    public static function replaceCallbackArray($patterns_and_callbacks, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace_callback_array($patterns_and_callbacks, $subject, $limit, $count);
        return $return_values;
    }
    //: string|array|null


    ### 分割


    public static function split()
    {
        $return_values = preg_split($pattern, $subject, $limit, $flags);
    }
    //: array|false

}
