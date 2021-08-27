<?php

namespace Ext;

class Error
{
    const VERSION = '';

    // 获取最后发生的错误
    public static function getLast()
    {
        return error_get_last();
    }
}
