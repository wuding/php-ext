<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = 25.1108;
    const REVISION = 3;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'parse_url' => [
            'url' => 'string',
            'component' => ['int', -1],
            ':' => 'int|string|array|null|false',
        ],
        'set_error_handler' => [
            'callback' => ['callable'],
            'error_levels' => ['int', E_ALL],
        ],
        'base64_decode' => [
            'string' => 'string',
        ],
        'base64_encode' => [
            'string' => 'string',
        ],
    ];

    // 1. 编解码
    static function base64_decode()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }
    static function base64_encode()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }

    static function rawurldecode(){}
    static function rawurlencode(){}

    static function urldecode(){}
    static function urlencode(){}

    // 2. 获取 HTTP 头和元标签
    static function get_headers(){}
    static function get_meta_tags(){}

    // 3. 拼接成查询字符串
    static function http_build_query(){}

    // 4. 解析定位地址
    static function parse_url()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }
}
