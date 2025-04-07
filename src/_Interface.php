<?php

namespace Ext;

const CON = 1;

interface _Interface
{
    const VERSION = 25.0206;
    const REVISION = 1;

    public function __construct();

    public function _call($func, $args);
}
