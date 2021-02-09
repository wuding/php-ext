<?php

namespace Ext;

class GetText extends _Abstract
{
    const VERSION = '21.2.9';
    public static $domain = array();
    public static $directory = array();
    public $init = array();

    // 初始化
    public function __construct($category = null, $locale = null, $directory = null, $domain = null, $text_domain = null)
    {
        $domain = $domain ?: 'messages';
        // 设置地区信息
        if (!is_null($category)) {
            $this->init['setlocale'] = setlocale($category, $locale);
        }

        // 绑定文本域
        $this->init['bindTextDomain'] = self::bindTextDomain($domain, $directory);

        // 设置默认域
        if (!is_null($text_domain)) {
            $this->init['textdomain'] = textdomain($text_domain);
        } elseif (is_string($domain)) {
            $this->init['textdomain'] = textdomain($domain);
        }
    }

    // 批量设置文本域的路径
    public static function bindTextDomain($domain = null, $directory = null, $return = null)
    {
        $array = $dir = $result = array();
        // 批量
        if (is_array($domain)) {
            foreach ($domain as $key => $value) {
                $path = is_numeric($key) ? $directory : $key;
                $hash = md5($path);
                $variable = is_array($value) ? $value : array($value);
                if (!array_key_exists($hash, $array)) {
                    $array[$hash] = array();
                    $dir[$hash] = $path;
                }
                foreach ($variable as $var) {
                    if (!in_array($var, $array[$hash])) {
                        $array[$hash][] = $var;
                    }
                }
            }
        } else { // 单个
            $hash = md5($directory);
            if (!array_key_exists($hash, $array)) {
                $array[$hash] = array();
                $dir[$hash] = $directory;
            }
            if (!in_array($domain, $array[$hash])) {
                $array[$hash][] = $domain;
            }
        }

        // 遍历设置
        foreach ($array as $key => $value) {
            $directory = $dir[$key];
            foreach ($value as $val) {
                $bind = bindtextdomain($val, $directory);
                if (!$bind && !in_array($directory, $result)) {
                    $result[] = $directory;
                }
            }
        }

        // 返回结果或参数
        if (true === $return) {
            return array($array, $dir);
        }
        return $result;
    }
}
