<?php
namespace Ext;

class _Twins
{
    const VERSION = '20.197.19';

    // 配置静态属性
    public static function config($variable = null, $item = 'args')
    {
        foreach ($variable as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    static::$$item[$key][$k] = $v;
                }
                continue 1;
            }
            static::$$item[$key] = $value;
        }
        return static::$$item;
    }

    // 参数值覆盖默认值
    public static function args($item = null, $variable = [])
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
}
