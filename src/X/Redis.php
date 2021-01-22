<?php

namespace Ext\X;

class Redis
{
    const VERSION = '21.1.23';

    // 运行时
    public static $connects = array();
    public $key = null;
    public $init = null;

    // 通过数组初始化
    public function __construct($param_arr = null)
    {
        if ($param_arr) {
            call_user_func_array(array($this, 'init'), $param_arr);
        }
    }

    // 调用当前实例的方法
    public function __call($name, $arguments)
    {
        $obj = self::$connects[$this->key];
        return call_user_func_array(array($obj, $name), $arguments);
    }

    // BUG：没法用
    public static function __callStatic($name, $arguments)
    {
        $obj = new static();
        return call_user_func_array(array($obj, $name), $arguments);
    }

    // 初始化连接，不同配置生成多个实例
    public function init($host = null, $port = null, $timeout = null, $reserved = null, $retry_interval = null, $read_timeout = null, $option = null, $method = 'connect')
    {
        //=s
        $param_arr = func_get_args();
        $vars = get_defined_vars();

        //=z
        $json = json_encode($vars);
        $this->key = $key = md5($json);

        //=l
        if (array_key_exists($key, self::$connects)) {
            return $key;
        }

        //=j
        unset($param_arr[7]);
        $Redis = new \Redis();
        $this->init = call_user_func_array(array($Redis, $method), $param_arr);
        self::$connects[$key] = $Redis;

        //=g
        return $this->init;
    }

    // 将值编码为 JSON 储存
    public function setJSON($key = null, $value = null, $timeout = null)
    {
        $json = json_encode($value);
        $set = $this->set($key, $json, $timeout);
        return $set;
    }

    // 将读取的值进行 JSON 解码
    public function getJSON($key = null, $value = false)
    {
        $json = $this->get($key);
        if (false === $json) {
            return $value;
        }
        $val = json_decode($json);
        return $val;
    }
}
