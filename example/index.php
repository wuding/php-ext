<?php

/**
 * 计算日期之间的天数
 *
 * 使用命名空间，新建对象，设置参数，运行函数，返回结果
 */

namespace Ext\Example;

use Ext\DateTime;
use Ext\Phar;
use Ext\Interfaces\Closure;

class Index
{
    /**
     * 构建函数
     */
    public function __construct()
    {

    }

    /**
     * 两个日期对象之间的不同
     */
    public static function date_diff()
    {
        $datetime = new DateTime;
        $datetime1 = '2008-4-9';
        $datetime2 = '2019-4-9';
        $interval = $datetime->date_diff($datetime1, $datetime2);
        echo $interval->format('%R%a days');
    }

    /**
     * Unix 时间戳
     */
    public static function time()
    {
        echo \Ext\DateTime::time();
    }

    /**
     * 格式化日期
     */
    public static function format()
    {
        try {
            $date = new \DateTime('2000-01-01');
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }

        echo $date->format('Y-m-d');
    }

    /**
     * 解壓 Phar
    */
    public static function decompress()
    {
        $p = new Phar('I:/tmp/Users/Benny/Downloads/composer.phar');
        foreach ($p as $file) {
            print_r($file);
        }
        # echo $p->extractTo('compose');
    }

    /**
     * 复制一个闭包
     */
    public static function closure()
    {
        include 'closure.php';
        $bcl1 = Closure::bind($cl1, null, 'Ext\Example\A');
        $bcl2 = Closure::bind($cl2, new \Ext\Example\A(), 'Ext\Example\A');
        echo $bcl1(), "\n";
        echo $bcl2(), "\n";
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/../src/DateTime.php';
include __DIR__ . '/../src/Phar.php';
include __DIR__ . '/../src/Interfaces/Closure.php';

Index::closure();