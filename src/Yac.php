<?php
namespace Ext;

class Yac extends _Twins
{
    const VERSION = '20.197.19';

    // 运行时
    public static $handles = [];
    public static $pre = '';
    public $prefix = '';

    // 方法默认值
    public static $args = [
        'add' => [null, null, 0],
        'delete' => [null, null],
        'dump' => [-1],
        'get' => [null],
        'set' => [null, null, 0],
    ];

    public function __construct($prefix = '', $variable = null, $item = 'args')
    {
        if ($variable) {
            self::config($variable, $item);
        }
        $this->handle($prefix, true);
    }

    public function __call($name, $arguments = [])
    {
        $arr = self::args($name, $arguments);
        return call_user_func_array(array($this->handle(), $name), $arr);
    }

    public static function __callStatic($name, $arguments = [])
    {
        $arr = self::args($name, $arguments);
        return call_user_func_array(array(self::hand(), $name), $arr);
    }

    public function handle($prefix = null, $init = null)
    {
        $key = null === $prefix ? $this->prefix : $prefix;
        if ($init) {
            $this->prefix = $key;
        }
        return self::handles($key);
    }

    public static function hand($prefix = null, $init = null)
    {
        $key = null === $prefix ? self::$pre : $prefix;
        if ($init) {
            self::$pre = $key;
        }
        return self::handles($key);
    }

    public static function handles($key)
    {
        if (array_key_exists($key, self::$handles)) {
            return self::$handles[$key];
        }
        return self::$handles[$key] = new \Yac($key);
    }

    public static function hash($str, $prefix = null, $json = null)
    {
        $md5 = md5($str);
        $cacheKey = $prefix . $md5;
        $cacheValue = self::get($cacheKey);
        if ($json && false !== $cacheValue) {
            $cacheValue = json_decode($cacheValue);
        }
        return ['cacheKey' => $cacheKey, 'cacheValue' => $cacheValue];
    }

    public static function store($key, $value, $ttl = null, $json = null)
    {
        if (!$ttl) {
            return -1;
        }
        if ($json) {
            $value = json_encode($value);
        }
        $result = self::set($key, $value, is_numeric($ttl) ? $ttl : 0);
        if (!$result) {
            var_dump($result);
            print_r([get_defined_vars(), __FILE__, __LINE__]);
            exit;
        }
        return $result;
    }
}
