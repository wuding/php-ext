<?php

// namespace Ext\example\file;

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use Ext\File;

class CSV
{
    const VERSION = '23.8.16';
    const REVISION = 1;

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
}

$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);

$put = CSV::put(ROOT .'/vendor/wuding/php-ext/example/file/csv.txt', 'w', $list);

var_dump($put);
