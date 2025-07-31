<?php

use function Func\get;

class Example
{
    const REVISION = 1;
    const VERSION = 25.0708;

    function __construct()
    {
        $this->init();
    }

    function autoload()
    {
        $filename = ROOT .'/php-app/future/vendor/autoload.php';
        $autoload = require $filename;
        return $autoload;
    }

    function init()
    {
        $autoload = $this->autoload();
        $psr4 = [
            'Func\\' => ROOT .'/php-func/future/src',
            'Ext\\' => ROOT .'/php-ext/future/src',
        ];
        foreach ($psr4 as $key => $value) {
            $autoload->addPsr4($key, $value);
        }
    }

    function run()
    {
        $Vars = new \Func\Vars;

        $orig = [
            'string' => 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==',
        ];
        $param_arr = get($orig);
        $opt = [
            // 'value' => 0,
        ];
        $array_unshift = array_unshift($param_arr, $opt);

        $method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
        $function = array('\\Ext\\URL', $method ?: 'base64_decode');

        $expression = call_user_func_array($function, $param_arr);
        var_dump(get_defined_vars());
    }
}

define('ROOT', 'J:\git\github.com\wuding');
$Example = new Example;
$run = $Example->run();

/*
http://fu_ext:60524/example/url/index.php/base64_decode?string=VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==
*/
