<?php

// version 20250109.1

define('ROOT', dirname(__DIR__, 5));
$autoload = require ROOT .'/vendor/autoload.php';

use function php\func\get;
use Ext\Net;

$query_data = get(['var_array']);
$param_arr = get();
$param_arr = array_merge($query_data, $param_arr);
// print_r([$array_merge, $query_data, $param_arr]);exit;

$method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
$function = array('\\Ext\\Net', $method ?: 'exists');

$expression = call_user_func_array($function, $param_arr);
print_r($expression);

// /example/net/index.php/dns_get_record?hostname=urlnk.com
exit;

$facilities = array(
    LOG_AUTH,
    LOG_AUTHPRIV,
    LOG_CRON,
    LOG_DAEMON,
    LOG_KERN,
    // LOG_LOCAL0,
    LOG_LPR,
    LOG_MAIL,
    LOG_NEWS,
    LOG_SYSLOG,
    LOG_USER,
    LOG_UUCP,
);

for ($i = 0; $i < 1; $i++) {
    foreach ($facilities as $facility) {
        Net::openlog($var_array = [], 'test', LOG_PID, $facility);
        Net::syslog($var_array = [], LOG_ERR, "This is a test: " . memory_get_usage(true));
    }
}
