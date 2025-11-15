<?php

/*
函数处理
*/

namespace Ext;

class FuncHand extends _Abstract
{
    const REVISION = 1;
    const VERSION = 25.1115;

    // 1. 回调函数
    static function call_user_func(){}
    static function call_user_func_array(){}
    static function forward_static_call(){}
    static function forward_static_call_array(){}

    // 2. 参数列表
    static function func_get_arg(){}
    static function func_get_args(){}
    static function func_num_args(){}

    // 3. 定义检测
    static function function_exists(){}
    static function get_defined_functions(){}

    // 4. 注册注销
    static function register_shutdown_function(){}
    static function register_tick_function(){}
    static function unregister_tick_function(){}
}
