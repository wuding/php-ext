<?php
namespace Ext;

// 可以考虑用 Preg 做类名
class PerlCompatibleRegularExpressions extends _Dynamic
{
    public function quote($str, $delimiter = null)
    {
        return preg_quote($str, $delimiter);
    }
}
