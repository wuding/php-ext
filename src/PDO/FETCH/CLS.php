<?php
namespace Ext\PDO\FETCH;

// PDO::FETCH_CLASS
class CLS
{
    public $test = 1;

    public function __construct()
    {        
        $this->test = microtime();
    }

    public function __destruct()
    {
        $this->test = __LINE__;
        # print_r(get_object_vars($this));
    }
}
