<?php

/**
 * 错误处理函数
 */

namespace Ext;

class ErrorFunc
{
    /**
     * 构建函数
     */
    public function __construct($vars = [])
    {
        $this->init($vars);
    }

    /**
     * 初始化
     */
    public function init($vars = [])
    {
        foreach ($vars as $key => $value) {
            self::${$key} = $value;
        }
    }

    /**
     * 生成一个回溯
     */
    public static function debugBacktrace($options = DEBUG_BACKTRACE_PROVIDE_OBJECT, $limit = 0)
    {
        return debug_backtrace($options, $limit);
    }

    /**
     * 打印一个回溯
     */
    public static function debugPrintBacktrace()
    {

    }

    /**
     * 清除这最当前错误
     */
    public static function errorClearLast()
    {

    }

    /**
     * 获得这最后发生的错误
     */
    public static function errorGetLast()
    {

    }

    /**
     * 发送一个错误信息到这定义的错误函数常规程序
     */
    public static function errorLog()
    {

    }

    /**
     * 设置每一个 PHP 错误是报告
     */
    public static function errorReporting(int $level) : int
    {
        return error_reporting($level);
    }

    /**
     * 恢复这前面的错误处理函数
     */
    public static function restoreErrorHandler()
    {

    }

    /**
     * 恢复这前面定义的异常处理函数
     */
    public static function restoreExceptionHandler()
    {

    }

    /**
     * 设置一个用户定义的错误处理函数
     */
    public static function setErrorHandler()
    {

    }

    /**
     * 设置一个用户定义的异常处理函数
     */
    public static function setExceptionHandler()
    {

    }

    /**
     * 生成一个用户级别的错误/警告/提示信息
     */
    public static function triggerError()
    {

    }
}