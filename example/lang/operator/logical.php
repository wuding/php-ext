<?php

define('ROOT', dirname(__DIR__, 6));

$autoload = require ROOT ."/vendor/autoload.php";

$variable = array(
    array(
        'a' => 0,
        'b' => 0,
    ),
    array(
        'a' => 0,
        'b' => 1,
    ),
    array(
        'a' => 1,
        'b' => 0,
    ),
    array(
        'a' => 1,
        'b' => 1,
    ),
);

foreach ($variable as $key => $value) {
    $LogicalOperators = new \Ext\Lang\Operator\Logical($value);
    print_r($LogicalOperators);
    var_dump($LogicalOperators->and());
    var_dump($LogicalOperators->or());
    var_dump($LogicalOperators->xor());
    var_dump($LogicalOperators->not());
}

