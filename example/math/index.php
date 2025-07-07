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
            'number' => 11864986,
        ];
        $param_arr = get($orig);

        $method =  ltrim($_SERVER['PATH_INFO'] ?? '', '/');
        $function = array('\\Ext\\Math', $method ?: 'base62Encode');

        $expression = call_user_func_array($function, $param_arr);
        var_dump(get_defined_vars());
    }
}

define('ROOT', 'J:\git\github.com\wuding');
$Example = new Example;
$run = $Example->run();

/*
http://fu_ext:60524/example/math/index.php/base62Decode?number=NMCK
*/
