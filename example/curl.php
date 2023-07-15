<?php

defined('ROOT') OR define('ROOT', dirname(__DIR__, 4));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\cURL;

class ClientURL
{
    const VERSION = '23.7.15';
    const REVISION = 2;

}

$url = 'https://vpn.ht';
$url = 'http://urlnk.org/api/v2';
$url = 'http://gogs.phly.cc:3000';

$cURL = new cURL($url);
$var_array = array(
    'option' => array(
        CURLOPT_TIMEOUT => 100,
        CURLOPT_HEADER => true,
        CURLINFO_HEADER_OUT => true,
    ),
);

# $data = cURL::simulate($var_array);
# $data = cURL::getInfo();
$data = cURL::_const(cURL::$libcurl_errors);
# $data = constant('CURLE_OK');

/**/
$err = array();
foreach ($data as $key => &$value) {
    if (!is_numeric($value)) {
        $err[$key] = $value;
        $value = cURL::$libcurl_error_codes[$key] ?? $value;
    }
}

print_r($data);
var_dump($err);
