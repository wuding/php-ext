<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = 25.0725;
    const REVISION = 2;

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
    ];

    function parse_url()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }

    static function base64_decode()
    {
        return self::_call(__FUNCTION__, func_get_args());
    }
}
