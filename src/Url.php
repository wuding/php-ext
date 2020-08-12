<?php

/**
 * 处理 URL 字符串：编码，解码和解析。
 */

namespace Ext;

class Url
{
    const VERSION = '20.225.1195';

    public static $str = null;
    public static $constants = array();
    public static $constants_string = 'PHP_URL_SCHEME|PHP_URL_HOST|PHP_URL_PORT|PHP_URL_USER|PHP_URL_PASS|PHP_URL_PATH|PHP_URL_QUERY|PHP_URL_FRAGMENT|PHP_QUERY_RFC1738|PHP_QUERY_RFC3986';

    public function __construct($str = null)
    {
        self::$str = $str;
        $this->init();
    }

    /**
     * 初始化
     */
    public function init()
    {
        $constants_array = explode('|', self::$constants_string);
        foreach ($constants_array as $constant_name) {
            eval("\$const = $constant_name;");
            self::$constants[$constant_name] = $const;
        }
    }

    /**
     * 解码 MIME base64
     */
    public function base64Decode($data, $strict = false)
    {
        return base64_decode($data, $strict);
    }

    /**
     * 编码 MIME base64
     */
    public function base64Encode(string $data)
    {
        return base64_encode($data);
    }

    /**
     * 获取 HTTP 请求头
     */
    public function getHeaders(string $url, $format = 0, $context = null)
    {
        return get_headers($url, $format);
    }

    /**
     * 解压标签元数据
     */
    public function getMetaTags(string $filename, $use_include_path = false)
    {
        return get_meta_tags($filename, $use_include_path);
    }

    /**
     * 生成 URL 编码的请求字符串
     */
    public static function httpBuildQuery($query_data, $numeric_prefix = '', $arg_separator = '&', $enc_type = PHP_QUERY_RFC1738)
    {
        return http_build_query($query_data, $numeric_prefix, $arg_separator, $enc_type);
    }

    public static function buildQuery($query_data, $numeric_prefix = '', $arg_separator = '&', $enc_type = PHP_QUERY_RFC1738)
    {
        $queryString = self::httpBuildQuery($query_data, $numeric_prefix, $arg_separator, $enc_type);
        return $query = $queryString ? "?$queryString" : $queryString;
    }

    public static function httpBuildUrl($variable)
    {
        $pieces = [];
        foreach ($variable as $key => $value) {
            switch ($key) {
                case 'scheme':
                    $pieces[] = self::scheme($value);
                    break;

                case 'query':
                    $pieces[] = self::query($value);
                    break;

                default:
                    $pieces[] = $value;
                    break;
            }
        }
        return $str = implode('', $pieces);
    }

    public static function scheme($str)
    {
        $str .= '://';
        return $str;
    }

    public static function query($str)
    {
        $str = $str ? "?$str" : $str;
        return $str;
    }

    /**
     * 解析并返回 URL 组件部分
     */
    public function parse(string $url, $component = -1)
    {
        return parse_url($url, $component);
    }

    /**
     * 解码 URL 编码的字符串
     */
    public static function rawDecode($str = null)
    {
        return rawurldecode(self::_getStr($str));
    }

    /**
     * 编码根据 RFC 3986
     */
    public static function rawEncode($str = null)
    {
        return rawurlencode(self::_getStr($str));
    }

    /**
     * 
     */
    public function decode($str = null)
    {
        return urldecode(self::_getStr($str));
    }

    /**
     *
     */
    public function encode($str = null)
    {
        return urlencode(self::_getStr($str));
    }

    public function __call($name, $arguments)
    {
        self::_debug(func_get_args());
    }

    public static function __callStatic($name, $arguments)
    {
        self::_debug(func_get_args());
    }

    public static function _getStr($str = null)
    {
        if (null === $str) {
            $str = self::$str;
        }
        return $str;
    }

    public static function _debug($info)
    {
        print_r($info);
        print_r(__FILE__);
        exit;
    }
}
