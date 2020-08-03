<?php
namespace Ext\X;

class PhpRedis
{
    // 运行时
    public static $handles = [];
    public static $pre = '';

    // 方法参数名
    public static $arg = [
        'conn' => ['host', 'port', 'timeout', 'reserved', 'retry_interval', 'read_timeout', 'option'],
    ];
    // 方法默认值
    public static $args = [
        'conn' => ['127.0.0.1', 6379, 0, null, 0, 0, []],
    ];

    public function __construct()
    {

    }

    public static function __callStatic($name, $arguments)
    {
        $param_arr = $arguments;
        return call_user_func_array(array(self::hand(), $name), $param_arr);
    }

    public static function hand($prefix = null, $default = null)
    {
        $key = $prefix ?? self::$pre;
        if ($default) {
            self::$pre = $key;
        }
        return self::handles($key);
    }

    public static function handles($key)
    {
        if (array_key_exists($key, self::$handles)) {
            return self::$handles[$key];
        }
        return self::$handles[$key] = new \Redis();
    }

    public static function args($function_name, $args, $key_name = null)
    {
        $vars = self::mergeVars('args');
        $arr = $vars[$function_name] ?? [];
        foreach ($args as $key => $value) {
            $arr[$key] = $value;
        }
        if ($key_name) {
            $keys = self::$arg[$function_name];
            $arr = array_combine($keys, $arr);
        }
        return $arr;
    }

    public static function mergeVars($varname)
    {
        $array = self::$$varname ?? [];
        $static = static::$$varname ?? [];
        foreach ($static as $key => $value) {
            if (array_key_exists($key, $array)) {
                foreach ($value as $k => $v) {
                    $array[$key][$k] = $v;
                }
            } else {
                $arr[$key] = $value;
            }
        }
        return $array;
    }

    public static function conn()
    {
        $var_array = self::args(__FUNCTION__, func_get_args(), true);
        extract($var_array);
        return $conn = self::connect($host, $port, $timeout, $reserved, $retry_interval, $read_timeout, $option);
        print_r(get_defined_vars());exit;
    }
}
