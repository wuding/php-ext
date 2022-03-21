<?php

namespace Ext\Lang\Type;

class Introduction
{
    const VERSION = '22.3.21';

    public $primitive_types = array(
        'scalar' => array('bool', 'int', 'float' => 'double', 'string'),
        'compound' => array('array', 'object', 'callable' => call_user_func(), 'iterable'),
        'special' => array('resource', 'NULL'),
    );
}
