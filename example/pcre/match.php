<?php

namespace Ext\example\pcre;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\PCRE;

class matchPhp
{
    const VERSION = '23.7.7';
    const REVISION = 1;
}

$PCRE = new PCRE;
$return_values = PCRE::_const();

$expression = [__FILE__, __LINE__,
    [
        $PCRE,
        $return_values,
    ],
];
var_dump($expression);
