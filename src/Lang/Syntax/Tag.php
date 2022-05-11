<?php

namespace Ext\Lang\Syntax;

class Tag
{
    const VERSION = '22.3.21';

    public $built = array(
        '--disable-short-tags' => null,
    );

    public $ini = array(
        'short_open_tag' => true,
    );

    // 开始和结束标记
    public static function openingAndClosingTags()
    {

    }

    // echo 标记简写
    public static function shortEchoTag()
    {

    }

    // 短标记
    public static function shortTags()
    {

    }

    // 仅包含 PHP 代码
    public static function onlyPhpCode()
    {

    }
}
