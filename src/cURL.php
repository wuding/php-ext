<?php

namespace Ext;

class cURL extends _Abstract
{
    const VERSION = 20.5871106;

    // 常量
    public static $constStr = '';

    // 配置
    public static $ini = array(
        'curl.cainfo' => null,
    );

    // 运行时
    public static $handle = null;
    public static $multi_handle = null;

    public function __construct($url = null)
    {
        if ($url) {
            self::init($url);
        }
    }

    /*
    +---------------------------------------------+
    + 初始化与执行、关闭
    +---------------------------------------------+
    */

    public static function init($url = null)
    {
        $ch = self::$handle = curl_init($url);
        return $ch;
    }

    public static function exec($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $exec = curl_exec($ch);
        return $exec;

    }

    // 没有返回值
    public static function close($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $close = curl_close($ch);
        return $close;
    }

    public static function multiInit()
    {
        $mh = self::$multi_handle = curl_multi_init();
        return $mh;
    }

    public static function multiExec($multi_handle = null, &$still_running = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $exec = curl_multi_exec($mh, $still_running);
        return $exec;
    }

    public static function multiClose($multi_handle = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $close = curl_multi_close($mh);
        return $close;
    }

    /*
    +---------------------------------------------+
    + 设置选项
    +---------------------------------------------+
    */

    public static function setOpt($handle = null, $option = null, $value = null, $empty = null)
    {
        if ($empty && !$value) {
            return false;
        }
        $ch = $handle ?: self::$handle;
        $set = curl_setopt($ch, $option, $value);
        return $set;
    }

    public static function setOptArray($handle = null, $options = null, $value = null, $empty = null)
    {
        if ($empty && !$value) {
            return false;
        }
        $ch = $handle ?: self::$handle;
        $set = curl_setopt_array($ch, $options);
        return $set;
    }

    /*
    +---------------------------------------------+
    + 批处理
    +---------------------------------------------+
    */

    public static function multiAddHandle($multi_handle = null, $handle = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $ch = $handle ?: self::$handle;
        $add = curl_multi_add_handle($mh, $ch);
        return $add;
    }

    public static function multiSelect($multi_handle = null, $timeout = 1.0)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $sel = curl_multi_select($mh, $timeout);
        return $sel;
    }

    /*
    +---------------------------------------------+
    + 自定义
    +---------------------------------------------+
    */

    public static function simulate($var_array = null, $post_fields = null, $http_header = null, $header = null)
    {
        $return_all = null;
        $option = array();
        if (is_array($var_array)) {
            extract($var_array);
        }

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        );
        foreach ($option as $key => $value) {
            $options[$key] = $value;
        }
        $opts = array(
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_fields,
        );
        $setArr = self::setOptArray(null, $options);
        $setHeader = self::setOpt(null, CURLOPT_HTTPHEADER, $http_header, true);
        $setPost = self::setOptArray(null, $opts, $post_fields, true);

        $exec = self::exec();
        $close = self::close();
        return $return_all ? get_defined_vars() : $exec;
    }
}
