<?php

use function Func\get;

class Example
{
    const REVISION = 1;
    const VERSION = 25.0714;

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
            'option' => 'display_errors',
            'value' => 1,
        ];
        $param_arr = get($orig);
        $opt = [
            // 'value' => 0,
        ];
        $array_unshift = array_unshift($param_arr, $opt);

        $method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
        $function = array('\\Ext\\Info', $method ?: 'ini_set');

        var_dump(ini_get('display_errors'));
        $expression = call_user_func_array($function, $param_arr);
        var_dump(get_defined_vars());
        var_dump(ini_get('display_errors'));
    }
}

define('ROOT', 'J:\git\github.com\wuding');
$Example = new Example;
$run = $Example->run();

/*
http://fu_ext:60524/example/info/index.php/ini_set?option=display_errors&value=1
*/
