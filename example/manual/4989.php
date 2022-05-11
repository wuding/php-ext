<?php

define('ROOT', dirname(__DIR__, 5));

$autoload = require ROOT ."/vendor/autoload.php";

use function php\func\get;

function shutdown()
{
    // This is our shutdown function, in
    // here we can do any last operations
    // before the script is complete.

    echo 'Script executed with success', PHP_EOL;
    var_export(func_get_args());
}

# register_shutdown_function('shutdown');

$param_arr = array('shutdown', 10, 16, 36, 62, 2);
$function = array('\\Ext\\FuncHand', 'registerShutdownFunction');

$expression = call_user_func_array($function, $param_arr);
var_export($expression);

exit('__EXIT__');
