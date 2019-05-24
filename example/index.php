<?php

/**
 * 计算日期之间的天数
 *
 * 使用命名空间，新建对象，设置参数，运行函数，返回结果
 */

namespace Ext\Example;

use Ext\DateTime;
use Ext\Math;
use Ext\Phar;
use Ext\Interfaces\Closure;
use Ext\Interfaces\Serializabled;
use Ext\Variable;
use Ext\Socket;
use Ext\ErrorFunc;
use Ext\Info;
use Ext\OutControl;
use Ext\Arrays\SQL;
use Ext\Configuration\Nginx;
use Ext\Reserved\Variable as ReservedVariable;
use Ext\Url;


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
        $datetime1 = '1980-11-22';
        $datetime2 = '1982-7-31';
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
     * 进制转换
     */
    public static function baseConvert($args = [])
    {
        list($number, $frombase, $tobase) = $args;
        echo Math::baseConvert($number, $frombase, $tobase);

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

    /**
     * 序列化
     */
    public static function serialize()
    {
        $value = ['key' => 'value'];
        $value = Variable::serialize($value);
        $value = Variable::unserialize($value);
        # print_r($value);

        // 对象
        $obj = new Serializabled('My private data');
        $ser = Variable::serialize($obj);
        $newobj = Variable::unserialize($ser);
        var_dump($newobj->getData());
    }

    /**
     * 简单的 TCP/IP 服务器
     */
    public static function socketServer()
    {
        ErrorFunc::errorReporting(E_ALL);
        Info::setTimeLimit(0);
        OutControl::implicitFlush();

        $address = '172.20.10.2';
        $port = 10000;

        if (false === Socket::create(AF_INET, SOCK_STREAM, SOL_TCP)) {
            echo __LINE__ . Socket::strerror() . PHP_EOL;
        }
        if (false === Socket::bind($address, $port)) {
            echo __LINE__ . Socket::strerror() . PHP_EOL;
        }
        if (false === Socket::listen(5)) {
            echo __LINE__ . Socket::strerror() . PHP_EOL;
        }

        do {
            if (false === ($msgsock = Socket::accept())) {
                echo Socket::strerror() . PHP_EOL;
                break;
            }

            $msg = "\nWelcome to the PHP Test Server. \n";
            Socket::write($msg, strlen($msg), $msgsock);

            do {
                if (false === ($buf = Socket::read(2048, PHP_NORMAL_READ, $msgsock))) {
                    echo Socket::strerror(Socker::lastError($msgsock)) . PHP_EOL;
                    break 2;
                }
                if (!$buf = trim($buf)) {
                    continue;
                }
                if ($buf == 'quit') {
                    break;
                }
                if ($buf == 'shutdown') {
                    Socket::close($msgsock);
                    break 2;
                }

                $talkback = "PHP: You said '$buf'.\n";
                Socket::write($talkback, strlen($talkback), $msgsock);
                echo "$buf\n";
            } while (true);
            Socket::close($msgsock);

        } while (true);
        Socket::close();
    }

    /**
     * 前缀老是重复，字数总是加一多少
     */
    public static function date_unexpected()
    {

    }

    /**
     * 怎么又是我的发音数字
     */
    public static function sql_insert_splice()
    {
        $fields = array('day', 'no', 'solar terms', 'festival', 'western astrology', 'month');
        $values = array(
        );
        foreach ([5 => 32, 6 => 31] as $key => $value) {
            for ($i = 1; $i < $value; $i++) {
                $values[] = array($i);
            }
        }

        # SQL::insert_into('`when`.`day`', $fields, $values);
        $SQL = new SQL();
        header('Content-Type: text/html; charset=utf-8');
        echo $SQL->insertInto('`when`.`day`', $fields, $values);
    }

    /**
     * 读取一个 nginx 配置文件
     */
    public static function nginxConf()
    {
        $nginx = new Nginx;
        echo $nginx->update('extra/ssl.php', 'ssl.conf.php');
        # $nginx->create('extra/ssl.php', array());
        # echo $nginx->read('ssl');
    }

    /**
     * 
     */
    public static function default()
    {
        $reservedVariable = new ReservedVariable;
        # $reservedVariable->globals();
        $url = $_GET['q'] ?? 'http://win.web.nf03.sycdn.kuwo.cn/6a03cd58ad212e8863b4756253d14de8/5c9b623e/resource/a3/66/92/195353300.aac';
        echo $data = \Ext\Filesystem::getContents($url);
        $url = preg_replace(['/:/', '/\/+/'], ['', '/'], $url);
        $url = 'D:/env/www/legend/dist/' . $url;
        echo \Ext\Filesystem::putContents($url, @$data ? : 'timeout', 'not overwrite');
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=GBK');

$_FILES = array('DateTime', 'Math', 'Phar', 'Interfaces/Closure', 'Interfaces/Serializabled', 'Variable', 'Socket', 'ErrorFunc', 'Info', 'OutControl', 'Arrays/SQL', 'Configuration/Nginx', 'Reserved/Variable', 'Filesystem');
/*
include __DIR__ . '/../src/DateTime.php';
include __DIR__ . '/../src/Math.php';
include __DIR__ . '/../src/Phar.php';
include __DIR__ . '/../src/Interfaces/Closure.php';
include __DIR__ . '/../src/Interfaces/Serializabled.php';
include __DIR__ . '/../src/Variable.php';
include __DIR__ . '/../src/Socket.php';
include __DIR__ . '/../src/ErrorFunc.php';
include __DIR__ . '/../src/Info.php';
include __DIR__ . '/../src/OutControl.php';
*/
include __DIR__ . '/../../php-func/src/Func.php';
include __DIR__ . '/../../php-ext/src/Langref.php';
func(array(), array('Arr', 'arr', 'Variable'));
arr_fixed_assoc($_FILES, true);
arr_reset_values($_FILES, ['prefix' => __DIR__ . '/../src/', 'suffix' => '.php'], true);
foreach ($_FILES as $file_key => $file_value) {
    # include $file_value;
}
print_r($_FILES);
$langref = new \Ext\Langref();
$langref->include($_FILES, null, null);


# Index::baseConvert([682, 10, 2, 1010101010]);
Index::default();
