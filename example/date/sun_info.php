<?php

namespace Ext\example\date;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class SunInfo
{
    const VERSION = '23.7.9';
    const REVISION = 1;
}

$method = \Ext\Date::funcToMethodName(pathinfo(__FILE__, PATHINFO_FILENAME));
$function = array('\\Ext\\Date', $method);
$param_arr = get(array(
    'timestamp' => time(),
    'latitude' => 41.8619,
    'longitude' => 123.9017,
    'options' => array('return_values' => 1, 'timezone' => 'PRC'),
));

$param_arr['options']['return_values'] = (int) $param_arr['options']['return_values'];

$expression = call_user_func_array($function, $param_arr);

$arr = array();
foreach ($expression['date_sun_info'] as $key => $value) {
    $arr[$key] = date('Y-m-d H:i:s', $value);
}
$expression['date_sun_info_time'] = $arr;
print_r($expression);
