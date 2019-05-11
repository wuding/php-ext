<?php

namespace Ext\Example;

class A {
    private static $sfoo = 1;
    private $ifoo = 2;
}

$cl1 = static function() {
    return A::$sfoo;
};

$cl2 = function() {
    return $this->ifoo;
};
