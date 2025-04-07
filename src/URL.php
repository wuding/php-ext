<?php

namespace Ext;

class URL extends _Abstract
{
    const VERSION = 25.0206;
    const REVISION = 1;

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
    ];

    function parse_url()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
}
