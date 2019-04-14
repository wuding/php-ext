<?php

/**
 * Standard PHP Library
 */

namespace Ext;

class SPL
{
    /**
     * 构建函数
     */
    public function __construct()
    {

    }

    /**
     * 返回接口每个继承根据给的类或接口
     */
    public function class_implements($class)
    {

    }

    /**
     * 返回父类
     */
    public function class_parents($class)
    {

    }

    /**
     * 返回类的使用特性
     */
    public function class_uses()
    {

    }

    /**
     * 调用迭代器的每个元素的函数
     */
    public function iterator_apply($iterator, $function)
    {

    }

    /**
     * 迭代器元素数量
     */
    public function iterator_count($iterator)
    {

    }

    /**
     * 复制迭代器到一个数组
     */
    public function iterator_to_array($iterator)
    {

    }

    /**
     * 尝试所有注册的 __autoload() 函数去加载请求的类
     */
    public function spl_autoload_call($class_name)
    {

    }

    /**
     * 注册并返回默认文件扩展名
     */
    public function spl_autoload_extensions()
    {

    }

    /**
     * 返回所有注册的 __autoload() 函数
     */
    public function spl_autoload_functions($oid)
    {

    }

    /**
     * 注册指定的函数作为 __autoload() 实现
     * 
     * @param $autoload_function  欲注册的自动装载函数
     * @param $throw              无法成功注册时，是否抛出异常
     * @param $prepend            如果是真会添加函数到队列之首
     */
    public function autoloadRegister(callable $autoload_function, bool $throw = true, bool $prepend = false) : bool
    {
        return spl_autoload_register($autoload_function, $throw, $prepend);
    }

    /**
     * 注销鉴于函数作为 __auotload()
     */
    public function spl_autoload_unregister($autoload_function)
    {

    }

    /**
     * 默认实施为 __auotload()
     */
    public function spl_autoload($class_name)
    {

    }

    /**
     * 返回可用的 SPL 类
     */
    public function spl_classes($oid)
    {

    }

    /**
     * 返回给与对象散列 ID 
     */
    public function spl_object_hash($obj)
    {

    }

    /**
     * 返回给的对象的迭代器对象处理句柄
     */
    public function spl_object_id()
    {
        
    }
}