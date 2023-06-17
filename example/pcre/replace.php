<?php

namespace Ext\example\pcre;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\PCRE;

class replacePhp
{
    const VERSION = '23.6.17';
}

// https://www.php.net/manual/en/function.preg-replace.php#example-4829
// Example #1 Using backreferences followed by numeric literals
$subject = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';

$replacement = '${1}1,$3';
$replacement = '${1}1,${2}1,${3}a';

$return_values = PCRE::replace($pattern, $replacement, $subject);

$expression = [__FILE__, __LINE__,
    // 'vars' => get_defined_vars(),
    [
        $subject,
        $pattern,
        $replacement,
        $return_values,
    ],
];
var_dump($expression);
