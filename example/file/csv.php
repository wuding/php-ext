<?php

// namespace Ext\example\file;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\File;

class CSV
{
    const VERSION = '23.8.18';
    const REVISION = 2;

    public static function put($filename, $mode = 'w', $variable)
    {
        $File = new File($filename, $mode);

        $puts = array();
        foreach ($variable as $key => $value) {
            $puts[$key] = $File::putCsv(null, $value);
        }

        $close = $File::close();

        $return_values = array(
            $File::$instances,
            $puts,
            $close,
        );

        return $return_values;
    }

    public static function get($filename, $mode = 'r')
    {
        $File = new File($filename, $mode);

        $gets = array();
        while (($data = $File::getCsv(null, 1000)) !== false) {
            $gets[] = $data;
        }

        $close = $File::close();

        $return_values = array(
            $File::$instances,
            $gets,
            $close,
        );

        return $return_values;
    }
}

$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);

$put = CSV::put(ROOT .'/vendor/wuding/php-ext/example/file/csv.txt', 'w', $list);
$put = CSV::get(ROOT .'/vendor/wuding/php-ext/example/file/csv.txt', 'r');

var_dump($put);
