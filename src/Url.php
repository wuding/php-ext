<?php

/**
 * 处理 URL 字符串：编码，解码和解析。
 */

namespace Ext;

class Url
{
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
    public function base64Decode(string $data, bool $strict = false) : string
    {
        return base64_decode($data, $strict);
    }

    /**
     * 编码 MIME base64
     */
    public function base64Encode(string $data) : string
    {
        return base64_encode($data);
    }

    /**
     * 获取 HTTP 请求头
     */
    public function getHeaders(string $url, int $format = 0) : array
    {
        return get_headers($url, $format);
    }

    /**
     * 解压标签元数据
     */
    public function getMetaTags(string $filename, bool $use_include_path = false) : array
    {
        return get_meta_tags($filename, $use_include_path);
    }

    /**
     * 生成 URL 编码的请求字符串
     */
    public function httpBuildQuery(mixed $query_data, $numeric_prefix = '', string $arg_separator = '&', int $enc_type = PHP_QUERY_RFC1738) : string
    {
        return http_build_query($query_data, $numeric_prefix, $arg_separator, $enc_type);
    }

    /**
     * 解析并返回 URL 组件部分
     */
    public function parse(string $url, int $component = -1) : mixed
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
