<?php

namespace Ext;

class Link extends \Ext\File
{
    const VERSION = 25.0204;
    const REVISION = 1;

    static $args = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'sym' => [
            'target' => ['string'],
            'link' => ['string', null],
        ],
    ];

    function __construct()
    {

    }

    function is()
    {

    }

    function read()
    {

    }

    function info()
    {

    }

    function sym()
    {
        $expression = $this->_args(__FUNCTION__, func_get_args());
        // var_dump($expression);
        return $sym = call_user_func_array('symlink', $expression);

    }

    function hard()
    {

    }

    function un()
    {

    }
}
