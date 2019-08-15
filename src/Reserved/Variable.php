<?php

namespace Ext\Reserved;

class Variable
{
    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function init()
    {

    }

    public function server()
    {

    }

    public function env()
    {

    }

    public function session()
    {

    }

    public function cookie()
    {

    }

    public function post()
    {

    }

    public function get()
    {

    }

    public function request()
    {

    }

    public function files()
    {

    }

    public function php_errormsg()
    {

    }

    public function http_raw_post_data()
    {

    }

    public function http_response_header()
    {

    }

    public function argc()
    {

    }

    public function argv()
    {

    }

    public function globals()
    {
        print_r(\Func\globals());
    }
}
