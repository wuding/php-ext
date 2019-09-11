<?php

namespace Ext;

class ClassObj extends _Abstract
{
    public static function alias(string $original, string $alias, bool $autoload = true) : bool
    {
    	return class_alias($original, $alias, $autoload);
    }
}
