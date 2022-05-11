<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

$gets = get(array('num' => 2, 'base' => M_E));
extract($gets);

$logarithm = Ext\Math::log($num, $base);

function callback($buffer, $logarithm)
{
    $var_array = array(
        print_r($logarithm, true),
        var_export($logarithm, true),
        $buffer,
    );
    echo '<pre>';
    print_r($var_array);
    echo '</pre>';
}

ob_start();
var_dump($logarithm);
$contents = ob_get_contents();
ob_end_clean();

callback($contents, $logarithm);
