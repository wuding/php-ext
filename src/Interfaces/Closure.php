<?php

/**
 * 用于代表匿名函数的类。
 *
 * See http://php.net/class.closure.php
 */

namespace Ext\Interfaces;

class Closure
{
    /**
     * 用于禁止实例化的构造函数
     */
    public function __construct(void)
    {

    }

    /**
     * 复制一个闭包，绑定指定的 $this 对象和类作用域。
     *
     * @param Closure $closure  需要绑定的匿名函数
     * @param object  $newthis  需要绑定到匿名函数的对象，或者 NULL 创建未绑定的闭包。
     * @param mixed   $newscope 想要绑定给闭包的类作用域，或者 'static' 表示不改变。
     *
     * @return object|false     Closure 对象
     */
    public static function bind(Closure $closure, object $newthis, mixed $newscope = 'static') : Closure
    {

    }

    /**
     * 复制当前闭包对象，绑定指定的 $this 对象和类作用域。
     *
     * @param object  $newthis  绑定给匿名函数的一个对象，或者 NULL 来取消绑定。
     * @param mixed   $newscope 关联到匿名函数的类作用域，或者 'static' 保持当前状态。
     *
     * @return object|false     Closure 对象
     */
    public function bindTo(object $newthis, mixed $newscope = 'static') : Closure
    {

    }
}
