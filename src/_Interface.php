<?php

namespace Ext;

const CON = 1;

interface _Interface
{
    const VER = 25.0714;
    const REV = 3;

    public function __construct();

    static function _call($func, $args);
}
