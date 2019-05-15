<?php
/**
 * 输出缓冲控制
 */
namespace Ext;

class OutControl
{
    /**
     * 打开/关闭绝对刷送
     */
    public static function implicitFlush(int $flag = 1)
    {
        return ob_implicit_flush($flag);
    }
}
