<?php

namespace Ext;

class Misc extends _Abstract
{
    const VERSION = 25.0211;
    const REVISION = 1;

    static $func = [
        '__construct' => [
            'options' => [],
            'target' => ['string'],
            'link' => ['string', null],
        ],
        'define' => [
            'constant_name' => ['string', ''],
            'value' => 'mixed',
            'case_insensitive' => ['bool', false],
            ':' => 'bool',
            '' => [
            ],
        ],
    ];

    static $repo = [
    ];

    function define()
    {
        $args = func_get_args();
        $constant_name = $args[1];
        if (is_array($constant_name)) {
            print_r($constant_name);
            $_calls = [];
            foreach ($constant_name as $key => $value) {
                $_calls[] = $this->_call(__FUNCTION__, [[], $key, $value]);
            }
            // print_r($_calls);die;
            return $_calls;
        }
        return $_call = $this->_call(__FUNCTION__, $args);
        print_r($args);
        print_r($_call);
        //
    }
}
