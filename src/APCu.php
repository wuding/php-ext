<?php
namespace Ext;

class APCu
{
    const VERSION = '20.196.1902';

    // 方法默认值
    public static $args = [
        'add' => [null, null, 0, false],
        'cacheInfo' => [false],
        'fetch' => [null],
        'store' => [null, null, 0, false],
    ];

    public function __construct($variable = null, $item = 'args')
    {
        if ($variable) {
            self::config($variable, $item);
        }
    }

    // 配置静态属性
    public static function config($variable = null, $item = 'args')
    {
        foreach ($variable as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    self::$$item[$key][$k] = $v;
                }
                continue 1;
            }
            self::$$item[$key] = $value;
        }
        return self::$$item;
    }

    // 参数值覆盖默认值
    public static function args($variable, $item = null)
    {
        $args = self::mergeVars('args');
        $arr = $args[$item] ?? [];
        foreach ($variable as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }

    // 合并静态属性
    public static function mergeVars($varname = null)
    {
        $arr = self::$$varname ?? [];
        $static = static::$$varname ?? [];
        foreach ($static as $key => $value) {
            if (!array_key_exists($key, $arr)) {
                $arr[$key] = $value;
            } else {
                foreach ($value as $k => $v) {
                    $arr[$key][$k] = $v;
                }
            }
        }
        return $arr;
    }

    // 添加一个或多个缓存项目
    public static function add()
    {
        $arr = self::args(func_get_args(), __FUNCTION__);
        $values = $arr[0];
        $result = apcu_add($values, $arr[1], $arr[2]);
        return self::groupResult($result, $arr[3], $values);
    }

    // 获取缓存信息
    public static function cacheInfo()
    {
        $arr = self::args(func_get_args(), __FUNCTION__);
        $cachedData = apcu_cache_info($arr[0]);
        return $cachedData;
    }

    public function cas()
    {

    }

    // 清空缓存
    public static function clearCache()
    {
        return apcu_clear_cache();
    }

    public function dec()
    {

    }

    public function delete()
    {

    }

    public function enabled()
    {

    }

    public function entry()
    {

    }

    public function exists()
    {

    }

    // 获取一个缓存项
    public static function fetch()
    {
        $arr = self::args(func_get_args(), __FUNCTION__);
        $result = apcu_fetch($arr[0]);
        return $result;
    }

    public function inc()
    {

    }

    public function smaInfo()
    {

    }

    // 存储一个或多个缓存项目
    public static function store()
    {
        $arr = self::args(func_get_args(), __FUNCTION__);
        $values = $arr[0];
        $result = apcu_store($values, $arr[1], $arr[2]);
        return self::groupResult($result, $arr[3], $values);
    }

    // 是否分组返回结果
    public static function groupResult($result, $group = null, $values = null)
    {
        if ($group && is_array($values)) {
            $res = [[], []];
            foreach ($values as $key => $value) {
                $failure = isset($result[$key]) ? 0 : 1;
                $res[$failure][] = $key;
            }
            return $res;
        }
        return $result;
    }
}
