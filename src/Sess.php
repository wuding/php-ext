<?php

namespace Ext;

class Sess
{
    const VERSION = '23.7.16';
    const REVISION = 2;

    public static $predefined_constants = array(
        /* session_id() string */
        'SID',

        /* session_status() int */
        'PHP_SESSION_DISABLED',
        'PHP_SESSION_NONE',
        'PHP_SESSION_ACTIVE',
    );



    /*
    +---------------------------------------------+
    + initial
    +---------------------------------------------+
    */


    public function __construct()
    {

    }



    /*
    +---------------------------------------------+
    + startup
    +---------------------------------------------+
    */


    public static function start($options = array())
    {


        $return_values = session_start($options);
/*
        $get_cookie_params = session_get_cookie_params();


        var_dump($expression = [__FILE__, __LINE__,
            'vars' => get_defined_vars(),
        ]);
*/
        return $return_values;
    }
    //: bool



    /*
    +---------------------------------------------+
    + cookie
    +---------------------------------------------+
    */


    public static function getCookieParams()
    {
        $return_values = session_get_cookie_params();
        return $return_values;
    }
    //: array

}
