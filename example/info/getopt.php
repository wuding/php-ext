<?php

// namespace Ext\example\info;

/*
shell> php example.php -f "value for f" -v -a --required value --optional="optional value" --option
https://www.php.net/manual/en/function.getopt.php#getopt.examples-2
Example #2 getopt() example: Introducing long options
array(6) {
  ["f"]=>
  string(11) "value for f"
  ["v"]=>
  bool(false)
  ["a"]=>
  bool(false)
  ["required"]=>
  string(5) "value"
  ["optional"]=>
  string(14) "optional value"
  ["option"]=>
  bool(false)
}
*/

defined('ROOT') OR define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

class GetOpt
{
    const VERSION = '23.7.15';
    const REVISION = 1;

    public function __construct()
    {

    }

    public static function run()
    {
        $function = array('\\Ext\\Info', 'getOpt');
        $param_arr = array(
            'short_opts' => 'r:o::',
            'long_opts' => array(
                'required:',
                'optional::',
        ));
        $return_values = call_user_func_array($function, $param_arr);


        $expression = array(
            'function' => $function,
            'return_values' => $return_values,
        );
        return $expression;
    }
}

print_r(GetOpt::run());
