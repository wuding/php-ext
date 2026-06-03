<?php

namespace Ext;

class Net
{
    const VERSION = 26.0225;
    const REVISION = 3;

    function __construct($str = null)
    {
        $this->init($str);
    }

    function __call($name, $arguments)
    {
        return call_user_func_array(array($this, $name), $arguments);
    }

    /*
    custom function
    */

    static function _request_parse_body($options = null)
    {
        return $arr = [
            $_POST,
            $_FILES,
        ];
    }
    //: array

    static function location($url, $exit = null, $var_array = [])
    {
        $replace = true;
        $response_code = null;
        extract($var_array);
        $string = "Location: $url";
        if ($response_code) {
            header($string, $replace, $response_code);
        } else {
            header($string, $replace);
        }

        if ($exit) {
            exit;
        }
    }

    /*
    short function name
    */

    static function interfaces($var_array = [])
    {
        extract($var_array);
        return net_get_interfaces();
    }

    /*
    original function name
    */

    static function request_parse_body($var_array = null, $options = null)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        $vc = version_compare(phpversion(), '8.4.0', '>=');
        if ($vc) {
            $res = request_parse_body($options);
        } else {
            $res = self::_request_parse_body($options);
        }
        print_r(get_defined_vars());exit;
    }
    //: array

    static function openlog($var_array = null, $prefix = null, $flags = null, $facility = null)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        $res = openlog($prefix, $flags, $facility);
        #print_r(get_defined_vars());exit;
    }
    //: true

    static function syslog($var_array = null, $priority = null, $message = null)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        $res = syslog($priority, $message);
        print_r(get_defined_vars());exit;
    }
    //: true

    static function getmxrr($var_array = null, $hostname = null,  &$hosts = null, &$weights = null)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        $res = getmxrr($hostname, $hosts, $weights);
        print_r(get_defined_vars());exit;
    }
    //: bool

    static function checkdnsrr($var_array = null, $hostname = null, $type = "MX")
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        $args = func_get_args();
        print_r(get_defined_vars());exit;
        return checkdnsrr($hostname, $type);
    }
    //: bool

    static function dns_get_record($var_array = null, $hostname = null, $type = DNS_ANY, &$authoritative_name_servers = null, &$additional_records = null, $raw = false)
    {
        if (is_array($var_array)) {
            extract($var_array);
        }

/*        $args = func_get_args();
        print_r(get_defined_vars());exit;*/
        return dns_get_record($hostname, $type, $authoritative_name_servers, $additional_records, $raw);
    }
    //: array|false

    static function net_get_interfaces($var_array = [])
    {
        if (is_array($var_array)) {
            extract($var_array);
        }
        return self::interfaces();
    }
    //: array|false

    /*
    +---------------------------------------------------------------+
    + header
    +---------------------------------------------------------------+
    */

    static function headers_sent($var_array = [], &$filename = null, &$line = null)
    {
        extract($var_array);
    }
    //: bool

    static function headers_list($var_array = [])
    {
        extract($var_array);
    }
    //: array

    static function header_remove($var_array = [], $name = null)
    {
        extract($var_array);
    }
    //: void

    static function header_register_callback($var_array = [], $callback = null)
    {
        extract($var_array);
    }
    //: bool

    static function header($var_array = [], $header = null, $replace = true, $response_code = 0)
    {
        extract($var_array);
    }
    //: void

    static function fsockopen($var_array = [], $hostname = null, $port = -1, $error_code = null, $error_message = null, $timeout = null)
    {
        extract($var_array);
    }
    //: resource|false
}
