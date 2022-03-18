<?php

namespace Ext;

class GMP
{
    const VERSION = '22.3.18';

    public function pow($num, $exponent)
    {
        $pow = gmp_pow($num, $exponent);
        return $pow;
    }
}
