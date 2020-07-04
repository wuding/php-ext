<?php

/**
 * 数组扩展
 */

namespace Ext;

class Arrays
{
    private static $constants = array();

    /**
     * 初始化数组参数
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * 初始化参数
     */
    public function init()
    {
        self::$constants = [
            'EXTR_OVERWRITE' => EXTR_OVERWRITE,
            'EXTR_SKIP' => EXTR_SKIP,
            'EXTR_PREFIX_SAME' => EXTR_PREFIX_SAME,
            'EXTR_PREFIX_ALL' => EXTR_PREFIX_ALL,
            'EXTR_PREFIX_INVALID' => EXTR_PREFIX_INVALID,
            'EXTR_IF_EXISTS' => EXTR_IF_EXISTS,
            'EXTR_PREFIX_IF_EXISTS' => EXTR_PREFIX_IF_EXISTS,
            'EXTR_REFS' => EXTR_REFS,
        ];
    }

    /**
     * 改变字母大小写
     */
    public static array_change_key_case($input)

    /**
     * 分割数组块
     */
    public static array_chunk($input, $size)
    {

    }

    /**
     * 返回数组单列值
     */
    public static array_column($input, $column_key)
    {

    }

    /**
     * 创建数组值根据另一个的键名
     */
    public static combine($keys, $values)
    {
        return array_combine($keys, $values);
    }


    /**
     * 统计数组值
     */
    public static array_count_values($input)
    {

    }

    /**
     * 计算数组不同根据添加的索引
     */
    public static array_diff_assoc($array1, $array2)
    {

    }

    /**
     * 计算数组不同用键名比较
     */
    public static array_diff_key($array1, $array2)
    {

    }

    /**
     * 计算数组不同用附加索引用户回调的函数
     */
    public static array_diff_uassoc($array1, $array2)
    {

    }

    /**
     * 计算数组不同使用回调函数用键名比较
     */
    public static array_diff_ukey($array1, $array2)
    {

    }

    /**
     * 比较数组不同
     */
    public static array_diff($array1, $array2)
    {

    }


    /**
     * 填充数组值用指定的键名
     */
    public static array_fill_keys($keys, $value)
    {

    }

    /**
     * 用值填充数组
     */
    public static array_fill($start_index, $num, $value)
    {

    }

    /**
     * 过滤元素数组使用回调函数
     */
    public static array_filter($input)
    {

    }

    /**
     * 交换所有键名用他们关联的值
     */
    public static array_flip($trans)
    {

    }

    /**
     * 计算数组交叉额外的索引检查
     */
    public static array_intersect_assoc($array1, $array2)
    {

    }

    /**
     * 计算数组交叉使用键名比较
     */
    public static array_intersect_key($array1, $array2)
    {

    }


    /**
     * 计算数组交集用额外的索引检查，比较索引根据回调函数
     */
    public static array_intersect_uassoc($array1, $array2)
    {

    }

    /**
     * 计算数组交集使用回调函数键名
     */
    public static array_intersect_ukey($array1, $array2)
    {

    }

    /**
     * 计算数组交集
     */
    public static array_intersect($array1, $array2)
    {

    }

    /**
     * 检测数组键名
     */
    public static keyExists(mixed $key, array $array)
    {
        if (is_array($key)) {
            $exists = 0;
            foreach ($key as $k) {
                if (array_key_exists($k, array)) {
                    $exists++;
                }
            }
            return $exists;
        }
        return array_key_exists($key, $array);
    }

    /**
     * 获得数组第一个键名
     */
    public static array_key_first($array)
    {

    }

    /**
     * 获取数组最后键名
     */
    public static array_key_last($array)
    {

    }


    /**
     * 返回所有键名数组键名的子集
     */
    public static array_keys($input)
    {

    }

    /**
     * 应用回调元素给予的数组
     */
    public static array_map($callback, $arr1)
    {

    }

    /**
     * 递归的合并一个或更多的数组
     */
    public static array_merge_recursive($array1)
    {

    }

    /**
     * 合并数组
     */
    public static array_merge($array1)
    {

    }

    /**
     * 排序多个或多维数组
     */
    public static array_multisort($arr)
    {

    }

    /**
     * 垫数组到规定长度用一个值
     */
    public static array_pad($input, $pad_size, $pad_value)
    {

    }


    /**
     * 弹出数组最后一个元素
     */
    public static array_pop($array)
    {

    }

    /**
     * 计算数组值的乘积
     */
    public static array_product($array)
    {

    }

    /**
     * 推元素到数组结尾
     */
    public static array_push($array, $var)
    {

    }

    /**
     * 挑选随机键从数组
     */
    public static array_rand($input)
    {

    }

    /**
     * 迭代减少数组单个值使用回调
     */
    public static array_reduce($input, $function)
    {

    }

    /**
     * 递归替换数组元素通过第一个数组
     */
    public static array_replace_recursive($array, $array1)
    {

    }


    /**
     * 替换元素从通过的数组插入到首数组
     */
    public static array_replace($array, $array1)
    {

    }

    /**
     * 返回数组用相反的顺序
     */
    public static array_reverse($array)
    {

    }

    /**
     * 搜索数组值并返回第一个相应的键名
     */
    public static array_search($needle, $haystack)
    {

    }

    /**
     * 转移一个元素到数组开始
     */
    public static array_shift($array)
    {

    }

    /**
     * 提取数组一段
     */
    public static array_slice($array, $offset)
    {

    }

    /**
     * 移除数组的部分并替换他用 - 剪接
     */
    public static array_splice($input, $offset)
    {

    }


    /**
     * 计算数组总值
     */
    public static array_sum($array)
    {

    }

    /**
     * 计算数组不同用额外索引检查，比较数据根据回调
     */
    public static array_udiff_assoc($array1, $array2)
    {

    }

    /**
     * 计算数组不同用额外索引检查，比较数据并索引用回调
     */
    public static array_udiff_uassoc($array1, $array2)
    {

    }

    /**
     * 计算数组不同用回调函数比较数组
     */
    public static array_udiff($array1, $array2)
    {

    }

    /**
     * 计算数组交集用额外索引检查，比较数据根据回调函数
     */
    public static array_uintersect_assoc($array1, $array2)
    {

    }

    /**
     * 计算数组交集用额外索引检查，比较数据并索引用分离的回调函数
     */
    public static array_uintersect_uassoc($array1, $array2)
    {

    }


    /**
     * 计算数组交集，比较数据用一个回调函数
     */
    public static array_uintersect($array1, $array2)
    {

    }

    /**
     * 移除重复值从一个数组
     */
    public static array_unique($array)
    {

    }

    /**
     * 前置一个或更多元素到数组开始
     */
    public static array_unshift($array, $var)
    {

    }

    /**
     * 返回数组所有值
     */
    public static array_values($input)
    {

    }

    /**
     * 递归的应用用户函数到数组的每个成员
     */
    public static array_walk_recursive($input, $funcname)
    {

    }

    /**
     * 使用用户提供的函数到数组每个成员
     */
    public static array_walk($array, $funcname)
    {

    }


    /**
     * 创建一个数组
     */
    public static array()
    {

    }

    /**
     * 排序数组用相反顺序并保持索引关联
     */
    public static arsort($array)
    {

    }

    /**
     * 排序数组并保持索引关联
     */
    public static asort($array)
    {

    }

    /**
     * 压紧紧凑 - 创建数组包含变量和他们的值
     */
    public static compact($varname)
    {

    }

    /**
     * 计算数组所有元素，或者对象中的一些东西
     */
    public static count($var)
    {

    }

    /**
     * 返回数组当天元素
     */
    public static current($array)
    {

    }


    /**
     * 返回当前键和值部分从一个数组，并提前数组指针
     */
    public static each($array)
    {

    }

    /**
     * 设置数组内部指针到最后元素
     */
    public static end($array)
    {

    }

    /**
     * 导入变量到当前符号表从一个数组
     */
    public static extract(array &$array, int $flags = EXTR_OVERWRITE, string $prefix = null) : int
    {
        if (!is_array($array)) {
            if (is_object($array)) {
                $array = (array) $array;
            }
        }
        return extract($array, $flags, $prefix);
    }

    /**
     * 检测数组值是否存在
     */
    public static in_array($needle, $haystack)
    {

    }

    /**
     * array_key_exists 的别名
     */
    public static key_exists($key, $array)
    {

    }

    /***
     * 从数组拿取一个键
     */
    public static key($array)
    {

    }

    /**
     * 排序一个数组根据键名逆序
     */
    public static krsort($array)
    {

    }

    /**
     * 用数组键排序
     */
    public static ksort($array)
    {

    }

    /**
     * 赋值变量如果他们是一个数组
     */
    public static list($varname)
    {

    }

    /**
     * 排序数组使用一个不敏感的案例“自然顺序”算法
     */
    public static natcasesort($array)
    {

    }

    /**
     * 排序数组使用一个“自然顺序”算法
     */
    public static natsort($array)
    {

    }

    /**
     * 提前数组内部指针
     */
    public static next($array)
    {

    }

    /**
     * current 的别名
     */
    public static pos()
    {

    }

    /**
     * 重绕数组内部指针
     */
    public static prev($array)
    {

    }

    /**
     * 创建数组元素的包含范围
     */
    public static range($low, $high)
    {

    }

    /**
     * 设置一个数组的内部指针到他的第一个元素
     */
    public static reset($array)
    {

    }

    /**
     * 用相反排序排列一个数组
     */
    public static rsort($array)
    {

    }

    /**
     * 洗牌改组一个数组
     */
    public static shuffle($array)
    {

    }

    /**
     * count 的别名
     */
    public static sizeof()
    {

    }

    /**
     * 排列一个数组
     */
    public static sort()
    {

    }

    /**
     * 排列一个数组用用户定义的比较函数并保持索引关联
     */
    public static uasort()
    {

    }

    /**
     * 排列一个数组用他的键名用用户定义的比较函数
     */
    public static uksort($array, $cmp_function)
    {

    }

    /**
     * 排列一个数组根据值使用用户定义的比较函数
     */
    public static usort($array, $cmp_function)
    {

    }

}
