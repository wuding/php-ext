<?php

/**
 * PHP 选项信息
 */

namespace Ext;

class Info
{
    /**
     * 预定义常量
     */
    private static $constants = [];

    /**
     * 构建函数
     */
    public function __construct()
    {
        self::$constants = [
            'CREDITS_GROUP' => CREDITS_GROUP,
            'CREDITS_GENERAL' => CREDITS_GENERAL,
            'CREDITS_SAPI' => CREDITS_SAPI,
            'CREDITS_MODULES' => CREDITS_MODULES,
            'CREDITS_DOCS' => CREDITS_DOCS,
            'CREDITS_FULLPAGE' => CREDITS_FULLPAGE,
            'CREDITS_QA' => CREDITS_QA,
            'CREDITS_ALL' => CREDITS_ALL,
            'INFO_GENERAL' => INFO_GENERAL,
            'INFO_CREDITS' => INFO_CREDITS,
            'INFO_CONFIGURATION' => INFO_CONFIGURATION,
            'INFO_MODULES' => INFO_MODULES,
            'INFO_ENVIRONMENT' => INFO_ENVIRONMENT,
            'INFO_VARIABLES' => INFO_VARIABLES,
            'INFO_LICENSE' => INFO_LICENSE,
            'INFO_ALL' => INFO_ALL,
            'INI_USER' => INI_USER,
            'INI_PERDIR' => INI_PERDIR,
            'INI_SYSTEM' => INI_SYSTEM,
            'INI_ALL' => INI_ALL,
            'ASSERT_ACTIVE' => ASSERT_ACTIVE,
            'ASSERT_CALLBACK' => ASSERT_CALLBACK,
            'ASSERT_BAIL' => ASSERT_BAIL,
            'ASSERT_WARNING' => ASSERT_WARNING,
            'ASSERT_QUIET_EVAL' => ASSERT_QUIET_EVAL,
            'PHP_WINDOWS_VERSION_MAJOR' => PHP_WINDOWS_VERSION_MAJOR,
            'PHP_WINDOWS_VERSION_MINOR' => PHP_WINDOWS_VERSION_MINOR,
            'PHP_WINDOWS_VERSION_BUILD' => PHP_WINDOWS_VERSION_BUILD,
            'PHP_WINDOWS_VERSION_PLATFORM' => PHP_WINDOWS_VERSION_PLATFORM,
            'PHP_WINDOWS_VERSION_SP_MAJOR' => PHP_WINDOWS_VERSION_SP_MAJOR,
            'PHP_WINDOWS_VERSION_SP_MINOR' => PHP_WINDOWS_VERSION_SP_MINOR,
            'PHP_WINDOWS_VERSION_SUITEMASK' => PHP_WINDOWS_VERSION_SUITEMASK,
            'PHP_WINDOWS_VERSION_PRODUCTTYPE' => PHP_WINDOWS_VERSION_PRODUCTTYPE,
            'PHP_WINDOWS_NT_DOMAIN_CONTROLLER' => PHP_WINDOWS_NT_DOMAIN_CONTROLLER,
            'PHP_WINDOWS_NT_SERVER' => PHP_WINDOWS_NT_SERVER,
            'PHP_WINDOWS_NT_WORKSTATION' => PHP_WINDOWS_NT_WORKSTATION,
        ];
    }

    /**
     * 设置获取各种各样的断言标记
     */
    public function assert_options()
    {

    }

    /**
     * 检测断言是否假
     */
    public function assert()
    {

    }

    /**
     * 返回当前处理标题
     */
    public function cli_get_process_title()
    {

    }

    /**
     * 设置处理标题
     */
    public function cli_set_process_title()
    {

    }

    /**
     * 加载 PHP 扩展在运行时
     */
    public function dl()
    {

    }

    /**
     * 找出是否一个扩展已加载
     */
    public function extension_loaded()
    {

    }

    /**
     * 总是收集任何检测的垃圾循环
     */
    public function gc_collect_cycles()
    {

    }

    /**
     * 取消激活圆形的参考收集器
     */
    public function gc_disable($oid)
    {

    }

    /**
     * 激活圆形参考收集器
     */
    public function gc_enable()
    {

    }

    /**
     * 返回状态圆形参考收集器
     */
    public function gc_enabled($oid)
    {

    }

    /**
     * 回收内存使用 Zend 引擎内存管理器
     */
    public function gc_mem_caches()
    {

    }

    /**
     * 获取信息关于垃圾收集器
     */
    public function gc_status()
    {

    }

    /**
     * 获取 PHP 配置选项值
     */
    public function get_cfg_var($option)
    {

    }

    /**
     * 获取当前 PHP 脚本拥有者的名称
     */
    public function get_current_user($oid)
    {

    }

    /**
     * 返回关联数组用所有常量及他们的值的名称
     */
    public function get_defined_constants()
    {

    }

    /**
     * 返回一个数组用一个模块的这个函数名
     */
    public function get_extension_funcs($module_name)
    {

    }

    /**
     * 获取当前包含路径配置选项 
     */
    public function get_include_path($oid)
    {

    }

    /**
     * 返回一个数组用包含或必须的文件名
     */
    public function get_included_files($oid)
    {

    }

    /**
     * 返回一个数组用所有模块编译并加载的名称
     */
    public function get_loaded_extensions()
    {

    }

    /**
     * 返回 magic_quotes_gpc 当前配置设置
     */
    public function get_magic_quotes_gpc($oid)
    {

    }

    /**
     * 获取 magic_quotes_runtime 当前激活配置设置
     */
    public function get_magic_quotes_runtime($oid)
    {

    }

    /**
     * get_included_files 别名
     */
    public function get_required_files()
    {

    }

    /**
     * 返回动态资源 
     */
    public function get_resources()
    {

    }

    /**
     * 获取环境变量值
     */
    public function getenv($varname)
    {

    }

    /**
     * 获取最后页编辑时间
     */
    public function getlastmod($oid)
    {

    }

    /**
     * 获取 PHP 脚本拥有者的 GID
     */
    public function getmygid($oid)
    {

    }

    /**
     * 获取当前脚本的信息节点
     */
    public function getmyinode($oid)
    {

    }

    /**
     * 获取 PHP 的处理 ID
     */
    public function getmypid($oid)
    {

    }

    /**
     * 获取 PHP 脚本拥有者的 UID
     */
    public function getmyuid($oid)
    {

    }

    /**
     * 获取命令行论点列表的选项
     */
    public function getopt($options)
    {

    }

    /**
     * 获取当前资源使用情况
     */
    public function getrusage()
    {

    }

    /**
     * ini_set 别名
     */
    public function ini_alter()
    {

    }

    /**
     * 获取所有配置选项
     */
    public function ini_get_all()
    {

    }

    /**
     * 获得一个配置选项的值
     */
    public function ini_get()
    {

    }

    /**
     * 恢复一个配置选项的值
     */
    public function ini_restore($varname)
    {

    }

    /**
     * 设置一个配置选项的值 
     */
    public function ini_set($varname, $newvalue)
    {

    }

    /**
     * set_magic_quotes_runtime 别名
     */
    public function magic_quotes_runtime()
    {

    }

    /**
     * 仿制 main
     */
    public function main()
    {

    }

    /**
     * 返回 PHP 内存分配峰值
     */
    public function memory_get_peak_usage()
    {

    }

    /**
     * 返回 PHP 内存分配数量
     */
    public function memory_get_usage()
    {

    }

    /**
     * 取回加载的 php.ini 文件路径
     */
    public function php_ini_loaded_file($oid)
    {

    }

    /**
     * 返回一个列表 .ini 文件解析的从添加 ini 目录
     */
    public function php_ini_scanned_files($oid)
    {

    }

    /**
     * 获取这个标志的 guid
     */
    public function php_logo_guid($oid)
    {

    }

    /**
     * 返回网页服务器和 PHP 之间的接口类型
     */
    public function php_sapi_name($oid)
    {

    }

    /**
     * 返回信息关于操作系统 PHP 运行中
     */
    public function php_uname()
    {

    }

    /**
     * 打印出 PHP 贡献者名单
     */
    public function phpcredits()
    {

    }

    /**
     * 输出信息关于 PHP 配置
     */
    public function phpinfo()
    {

    }

    /**
     * 获取当前超文本预处理器的版本号
     */
    public function phpversion()
    {

    }

    /**
     * 设置一个环境变量的值
     */
    public function putenv($setting)
    {

    }

    /**
     * 恢复包含路径配置选项的值
     */
    public function restore_include_path($oid)
    {

    }

    /**
     * 设置包含路径配置选项
     */
    public function set_include_path($new_include_path)
    {

    }

    /**
     * 设置当前动态配置 magic_qutoes_runtime 的设置
     */
    public function set_magic_quotes_runtime()
    {

    }

    /**
     * 最大执行时间限制
     */
    public static function setTimeLimit(int $seconds) : bool
    {
        return set_time_limit($seconds);
    }

    /**
     * 返回目录路径临时使用的文件
     */
    public function sys_get_temp_dir($oid)
    {

    }

    /**
     * 比较两个 PHP 标准版本数字字符串
     */
    public function version_compare($version1, $version2)
    {

    }

    /**
     * 获取 Zend guid
     */
    public function zend_logo_guid($oid)
    {

    }

    /**
     * 返回当前线程的唯一标识
     */
    public function zend_thread_id($oid)
    {

    }

    /**
     * 获取当前 Zend 引擎的版本号
     */
    public function zend_version($oid)
    {
        
    }
}