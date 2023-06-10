<?php

namespace Ext;

class Directory extends _Abstract
{
    const VERSION = '23.6.9';

    public static function scan($directory, $sorting_order = SCANDIR_SORT_ASCENDING, $context = null)
    {
        return $directories = scandir($directory, $sorting_order);
    }
}
