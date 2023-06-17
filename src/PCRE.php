<?php

namespace Ext;

class PCRE extends _Abstract
{
    const VERSION = '23.6.17';



    ## 分类

    ### 过滤


    ###

    ### 错误

    ### 匹配

    ###

    ### 替换

    public static function replace($pattern, $replacement, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace($pattern, $replacement, $subject, $limit, $count);
        return $return_values;
    }

    public static function replaceCallback($pattern, $callback, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace_callback($pattern, $callback, $subject, $limit, $count);
        return $return_values;
    }

    public static function replaceCallbackArray($patterns_and_callbacks, $subject, $limit = -1, $count = null)
    {
        $return_values = preg_replace_callback_array($patterns_and_callbacks, $subject, $limit, $count);
        return $return_values;
    }

    ### 分割
}
