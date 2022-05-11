<?php

namespace Ext;

class FuncHand
{
    const VERSION = '22.4.2';

    public $pages = array(
        'refman' => array(
            'register_shutdown_function' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Register a function for execution on shutdown',
                'para' => array(
                    'Description' => array(
                        'synopsis' => 'register_shutdown_function(callbable $callback, mixed ...$arg): ?bool',
                    ),
                    'Parameters' => array(
                        'callback' => "The shutdown callback to register. The shutdown callback are executed as the part of the request, so it's possible to send output from term and access ooutput buffers",
                        'args' => 'It is possible to pass paramters to the shut down function by passing additional parameters',
                    ),
                    'Return Values' => 'No value is returned',
                    'Error/Exceptions' => array(
                        'E_WARNING' => 'If the passed callback is not callable a E_WARNING level error will be generated',
                    ),
                    'Examples' => array(
                        'register_shutdown_function() example',
                    ),
                    'Notes' => array(
                        'Working directory of the script can change inside the shutdown function under some web servers, e.g. Apache',
                        'Shutdown functions will not be executed if the process is killed with a SIGTERM or SIGKILL signal. While you cannot intercept a SIGKILL, you can use pcntl_signal() to install a handler for a SIGTERM which uses exit() to end clearly',
                    ),
                    'See Also' => array(
                        'auto_append_file',
                        'exit()' => 'Output a message and terminate the current script',
                        'The section on connection handling',
                    ),
                ),
            ),
        ),
    );

    /*
    * $callback string|array|callable(func var)
    *
    */

    public static function callUserFuncArray($callback, $args)
    {
        $callback_value = call_user_func_array($callback, $args);
        return $callback_value;
    }


    /*
    +---------------------------------------------------------------+
    + 注册注销
    +---------------------------------------------------------------+
    */

    public static function registerShutdownFunction()
    {
        $param_arr = func_get_args();
        $function = 'register_shutdown_function';
        $return_values = call_user_func_array($function, $param_arr);
        return $return_values;
    }
}
