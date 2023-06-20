<?php

namespace Ext\example\mb;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\MB;

class ordPhp
{
    const VERSION = '23.6.20';
    const REVISION = 1;

    public function run()
    {
        // https://www.php.net/manual/en/function.mb-ord.php#example-2635
        $string = ['张', '无', '忌'];
        $encoding = null;
        $tobase = 16;
        $options = [
            // 'var_dump' => 1
        ];

        $return_values = MB::ord($string, $encoding, $tobase, $options);
        $glue = ' ';
        $origin_contents = implode($glue, $return_values);
        $output_contents = strtoupper($origin_contents);

        $expression = [__FILE__, __LINE__,
            'vars' => get_defined_vars(),
        ];
        var_dump($expression);
    }
}

$ordPhp = new ordPhp;
$ordPhp->run();


