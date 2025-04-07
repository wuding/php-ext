<?php

namespace Ext;

const CON = 1;

interface _Interface
{
    const VER = 25.0206;
    const REV = 2;

    public function __construct();

    public function _call($func, $args);
}
