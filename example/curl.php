<?php

defined('ROOT') OR define('ROOT', 'J:\http\php-app');#dirname(__DIR__, 4));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\cURL;
use Ext\File;

class ClientURL
{
    const VERSION = 25.1117;
    const REVISION = 3;
    static $filename = null;
    static $url = null;
    static $useragent = null;

    function __construct($orig = [], $properties = [], $args = [])
    {
        extract($orig);
        foreach ($properties as $key => $value) {
            $this->$key = $value;
        }
        self::init();
    }

    function __destruct()
    {

    }

    static function construct($orig = [])
    {
        return new static($orig);
    }

    static function init()
    {
        $url = 'https://is1-ssl.mzstatic.com/image/thumb/PurpleSource211/v4/17/d5/19/17d51985-0ae2-5e58-67da-38efbaf59ef8/Placeholder.mill/400x400bb-75.webp';
        $useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36';
        $get = $_GET;
        extract($_GET);
        self::$url = $url;
        self::$useragent = $useragent;

        $pattern = "#/+#";
        $replacement = '\\';
        $subject = parse_url($url, PHP_URL_PATH);
        $preg_replace = preg_replace($pattern, $replacement, $subject);
        $scheme = parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);
        self::$filename = $filename = "J:\Server\VPS\\38.147.190.9\D\coolapp.ooo\img\uri\\$scheme\\$host". $preg_replace;
        return get_defined_vars();
        print_r([__FILE__, get_defined_vars()]);die;
    }

    static function return_values($variable = [], $string = null, $delimiter = ',')
    {
        $string = trim($string);
        $count = count($variable);
        if (!$string || 1 === $count) {
            return $variable;
        }

        $array = explode($delimiter, $string);print_r([__FILE__, get_defined_vars()]);die;
        $arr = [];
        foreach ($variable as $key => $value) {
            if (array_key_exists($key, $array)) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }

    static function run($orig = [], $url = null, $useragent = null, $filename = null, $return = 'put')
    {
        extract($orig);
        $cURL = new cURL($url);
        $var_array = array(
            'option' => array(
                CURLOPT_TIMEOUT => 100,
                CURLOPT_USERAGENT => $useragent,
            ),
        );
        $data = cURL::simulate($var_array);
        $put = File::putContents($filename, $data);
        return self::return_values(get_defined_vars(), $return);
    }
}

$url = 'https://vpn.ht';
$url = 'http://urlnk.org/api/v2';
$url = 'http://gogs.phly.cc:3000';
$url = 'https://starwalk.space/gallery/images/planetary-alignment-infographic-28-feb-25/zh-Hans/750x7656.jpg';
$url = 'https://is1-ssl.mzstatic.com/image/thumb/PurpleSource211/v4/17/d5/19/17d51985-0ae2-5e58-67da-38efbaf59ef8/Placeholder.mill/400x400bb-75.webp';
$useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36';
extract($_GET);
$parse_url = parse_url($url, PHP_URL_PATH);
$pattern = "#/+#";
$replacement = '\\';
$subject = $parse_url;
$preg_replace = preg_replace($pattern, $replacement, $subject);
$ClientURL = new ClientURL();
ClientURL::init();
$orig = [
    'url' => ClientURL::$url,
    'filename' => ClientURL::$filename,
    'useragent' => ClientURL::$useragent,
];
$run = ClientURL::run($orig);
var_dump([__LINE__, $run]);
die;

print_r([__FILE__, get_defined_vars()]);

$cURL = new cURL($url);
$var_array = array(
    'option' => array(
        CURLOPT_TIMEOUT => 100,
        CURLOPT_HEADER => true,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_USERAGENT => $useragent,
        CURLOPT_PROXY => '127.0.0.1:9910',
    ),
);

$data = cURL::simulate($var_array);
# $data = cURL::getInfo();
// $data = cURL::_const(cURL::$libcurl_errors);
# $data = constant('CURLE_OK');

/*
$err = array();
foreach ($data as $key => &$value) {
    if (!is_numeric($value)) {
        $err[$key] = $value;
        $value = cURL::$libcurl_error_codes[$key] ?? $value;
    }
}
*/
$f = 'J:\Server\VPS\38.147.190.9\D\coolapp.ooo\img\uri\https';
$filename = 'J:\git\github.com\wuding\php-ext\develop\temp\FOOE77D.tmp';
// $data = File::getContents($filename);
$filenam = "$f\starwalk.space/gallery/images/planetary-alignment-feb-28-2025-st/zh-Hans/1140x641.jpg";
$filenam = "$f\starwalk.space/gallery/images/planetary-alignment-infographic-28-feb-25/zh-Hans/750x7656.jpg";
$put = File::putContents($filenam, $data);
print_r([$filename, $filenam, $put, $data]);
// var_dump($err);
