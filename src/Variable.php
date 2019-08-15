<?php

/**
 * 变量句柄函数
 */

namespace Ext;

class Variable
{

    public function __construct()
    {

    }

    /**
     * 获取变量布尔值
     */
    public static function boolval($var)
    {

    }

    /**
     * 倾倒字符串表现一个内部 Zend 值去输出
     */
    public static function debug_zval_dump($variable)
    {

    }

    /**
     * floatval 别名
     */
    public static function doubleval()
    {

    }

    /**
     * 决定一个变量是否为空
     */
    public static function empty($var)
    {

    }
/*--
null,false
空字符串，空数组，(int,string) 0
--*/

    /**
     * 获取变量浮点值
     */
    public static function floatval($var)
    {

    }

    /**
     * 返回所有定义变量的数组
     */
    public static function get_defined_vars($oid)
    {

    }

    /**
     * 返回资源类型
     */
    public static function get_resource_type($handle)
    {

    }

    /**
     * 获得变量的类型
     */
    public static function gettype($var)
    {
        return gettype($var);
    }

    /**
     * 导入 GET/POST/Cookie 变量到全局范围
     */
    public static function import_request_variables($types)
    {

    }

    /**
     * 获取变量整数值
     */
    public static function intval($var)
    {

    }

    /**
     *  查找是否一个变量是一个数组
     */
    public static function is_array($var)
    {

    }

    /**
     * 找出是否一个变量是布尔
     */
    public static function is_bool($var)
    {

    }

    /**
     * 验证变量内容可以被调为函数
     */
    public static function is_callable($name)
    {

    }

    /**
     * 核实变量内容是可计算值
     */
    public static function is_countable()
    {

    }

    /**
     * is_float 别名
     */
    public static function is_double()
    {

    }

    /**
     * 查找变量类型是否浮点
     */
    public static function is_float($var)
    {

    }

    /**
     * 查找变量类型是否整数
     */
    public static function is_int($var)
    {

    }

    /**
     * is_int 别名
     */
    public static function is_integer()
    {

    }

    /**
     * 核实变量内容是一个可迭代的值
     */
    public static function is_iterable()
    {

    }

    /**
     * is_int 的别名
     */
    public static function is_long()
    {

    }

    /**
     * 查找是否变量是 NULL
     */
    public static function is_null($var)
    {

    }
/*--
null 返回 true
--*/

    /**
     * 查找是否变量是一个数组或者数字字符串
     */
    public static function is_numeric($var)
    {

    }

    /**
     * 查找是否一个变量是一个对象
     */
    public static function is_object($var)
    {

    }

    /**
     * is_float 的别名
     */
    public static function is_real()
    {

    }

    /**
     * 查找是否一个变量是一个资源
     */
    public static function is_resource($var)
    {

    }

    /**
     * 查找是否一个变量是一个标量
     */
    public static function is_scalar($var)
    {

    }

    /**
     * 查找是否变量类型是一个字符串
     */
    public static function is_string($var)
    {

    }

    /**
     * 决定变量是声明的并不同与 NULL
	 * @return bool
     */
    public static function isset()
    {
		$result = null;
		$args = func_get_args();
		$num = func_num_args();
		$i = 0;
		foreach ($args as $arg) {
			$val = isset($arg);
			if (!$val) {
				$result = false;
			} else {
				$i++;
			}
		}
		if ($i && $num == $i) {
			$result = true;
		}
		return $result;
    }
/*--
null 返回 false
反向函数：is_null()
--*/

    /**
     * 打印人类可读信息关于一个变量
     */
    public static function printR(mixed $expression, bool $return = false) : mixed
    {

    }

    /**
     * 生成一个可存储表现值
     *
     * @param mixed $value 要序列化的值
     *
     * @return string
     */
    public static function serialize($value) : string
    {
        return serialize($value);
    }

    /**
     * 设置变量类型
     */
    public static function settype($var, $type)
    {

    }

    /**
     * 获取变量字符串值
     */
    public static function strval($var)
    {

    }

    /**
     * 创建一个 PHP 值从存储的表现
     *
     * @param string $str 已经存储的表示
     *
     * @return mixed
     */
    public static function unserialize(string $str)
    {
        return unserialize($str);
    }

    /**
     * 未设置一个给定的变量
     */
    public static function unset($var)
    {

    }

    /**
     * 转储变量信息
     */
    public static function var_dump($expression)
    {

    }

    /**
     * 输出或返回一个变量解析的字符串表现
     */
    public static function var_export($expression)
    {
        
    }
}
