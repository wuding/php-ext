/.<?php

namespace Ext;

class Str extends _Abstract
{
    const VERSION = 25.0404;
    const REVISION = 1;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'nl2br' => [
            'string' => 'string',
            'use_xhtml' => ['bool', true],
            ':' => 'string',
        ],
        'set_error_handler' => [
            'callback' => ['callable'],
            'error_levels' => ['int', E_ALL],
        ],
    ];

    function nl2br()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
}
