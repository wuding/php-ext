<?php

namespace Ext;

class Cls extends _Abstract
{
    const VERSION = 25.0206;
    const REVISION = 1;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'get_class' => [
            'object' => ['object', '?'],
            ':' => 'string',
            '' => [
                'object' => 'object',
            ],
        ],
    ];

    static $repo = [
    ];

    function get_class()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
}
