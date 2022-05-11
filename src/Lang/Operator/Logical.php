<?php

namespace Ext\Lang\Operator;

class Logical
{
    const VERSION = '22.3.16';

    public $args = array(
        '__construct' => array(),
    );

    public function __construct()
    {
        $vars = func_get_args();
        $this->args[__FUNCTION__] = $vars;
    }

    public function and()
    {
        extract($this->args['__construct'][0]);
        $result = $a && $b;
        return $result;
    }

    public function or()
    {
        extract($this->args['__construct'][0]);
        $result = $a || $b;
        return $result;
    }

    public function xor()
    {
        extract($this->args['__construct'][0]);
        $result = $a xor $b;
        return $result;
    }

    public function not()
    {
        extract($this->args['__construct'][0]);
        $result = !$a;
        return $result;
    }
}

