<?php
namespace Ext;

class Miscellaneous extends _Dynamic
{
    public function define($name, $value = null, $case_insensitive = false)
    {
        return define($name, $value, $case_insensitive);
    }

    public function defined($name)
    {
        return defined($name);
    }

    public function sleep($seconds)
    {
        return sleep($seconds);
    }
}
