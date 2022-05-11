<?php

define('ROOT', dirname(__DIR__, 6));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;
use Pkg\Func;

$param_arr0 = array(
    4,
    2,
    1,
);
/*
$function = array('\\Ext\\X\\FANN', 'createTrain');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);

$param_arr2 = array(
    $expression,
    'template.data',
);

$function = array('\\Ext\\X\\FANN', 'saveTrain');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);


$filename = 'template.data';
echo '<pre>';
echo file_get_contents($filename);
echo '</pre>';
*/
$variable = array(
    'row' => array(
        'function' => array('\Ext\X\FANN', 'createTrain'),
        'code_str' => '',
        'param_arr' => $param_arr0,
    ),
    'a' => array(
        'function' => array('\Ext\X\FANN', 'saveTrain'),
        'code_str' => "\$param_arr = array(\$results['row'], 'template.data');",
        #'param_arr' => array(),
    ),
);
$results = Func::batch($variable);
var_export($results);
exit;
