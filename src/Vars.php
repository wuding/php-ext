<?php

namespace Ext;

class Vars extends _Abstract
{
    const VERSION = 25.0206;
    const REVISION = 1;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'gettype' => [
            'value' => 'mixed',
            ':' => 'string',
        ],
    ];

    function gettype()
    {
        return $this->_call(__FUNCTION__, func_get_args());
    }
}
