<?php

/**
 * 套接字
 */
namespace Ext;

class Socket
{
    private static $data = [
        'sock' => null,
    ];

    /**
     * 构建函数
     */
    public function __construct()
    {

    }

    /**
     * 初始化参数
     */
    public function init()
    {

    }

    /**
     * 接受一个套接字连接
     */
    public static function accept(resource $socket = null) : resource
    {
        $socket = self::arg('sock', $socket);
        return socket_accept($socket);
    }

    /**
     * 创建并绑定到一个套接字从一个给定的地址信息
     */
    public static function addrinfoBind(resource $addr) : resource
    {
        return socket_addrinfo_bind($addr);
    }

    /**
     * 创建和连接到一个套接字从一个给予的地址信息
     */
    public static function addrinfoConnect(resource $addr) : resource
    {
        return ocket_addrinfo_connect($addr);
    }

    /**
     * 获取地址信息的详情
     */
     public static function addrinfoExplain(resource $addr) : array
     {
        return socket_addrinfo_explain($addr);
     }

     /**
      * 获取数组用得到的地址信息的连接关于该给定的主机名
      */
     public static function addrinfoLookup(string $host, string $service, array $hints) : array
     {
        return socket_addrinfo_lookup($host, $service, $hints);
     }

     /**
      * 给套接字绑定名字
      */
     public static function bind(string $address = null, int $port = 0, resource $socket = null) : bool
     {
        $socket = self::arg('sock', $socket);
        return socket_bind($socket, $address, $port);
     }

     /**
      * 清除套接字或者最后的错误代码上的错误
      */
     public static function socket_clear_error()
     {

     }

     /**
      * 关闭套接字资源
      */
     public static function close(resource $socket = null)
     {
        $socket = self::arg('sock', $socket);
        return socket_close($socket);
     }

     /**
      * 计算消息缓冲大小
      */
     public static function socket_cmsg_space()
     {

     }

     /**
      * 开启一个套接字连接
      */
     public static function socket_connect($socket, $address)
     {

     }

     /**
      * 打开一个套接字端口去接受连接
      */
     public static function socket_create_listen($port)
     {

     }

     /**
      * 创建不易觉察的套接字部分并存储它们到一个数组里
      */
     public static function socket_create_pair($domain, $type, $protocol, $fd)
     {

     }

     /**
      * 创建一个套接字（通讯节点）
      */
     public static function create(int $domain, int $type, int $protocol, $override = null)
     {
        $sock = socket_create($domain, $type, $protocol);
        if (!$override) {
            self::$data['sock'] = $sock;
        }
        return $sock;
     }

     /**
      * 导出一个套接字扩展资源到一个流压缩套接字
      */
     public static function socket_export_stream()
     {

     }

     /**
      * 获取套接字选项
      */
     public static function socket_get_option($socket, $level, $optname)
     {

     }

     /**
      * 别名 socket_get_option
      */
     public static function socket_getopt()
     {

     }

     /**
      * 查询远程端的给定套接字每个结果在主机/端口或 Unix 文件系统路径二者之一，依赖它的类型
      */
     public static function socket_getpeername($socket, $address)
     {

     }

     /**
      * 查询本地端的给定套接字每个结果在主机/端口或 Unix 文件系统路径二者之一，依赖他的类型
      */
     public static function socket_getsockname($socket, $addr)
     {

     }

     /**
      * 导入一个流
      */
     public static function socket_import_stream()
     {

     }

     /**
      * 返回套接字的最后错误
      */
     public static function lastError(resource $socket = null) : int
     {
        $socket = self::arg('sock', $socket);
        return socket_last_error($socket);
     }

     /**
      * 监听一个套接字连接
      */
     public static function listen(int $backlog = 0, resource $socket = null) : bool
     {
        $socket = self::arg('sock', $socket);
        return socket_listen($socket, $backlog);
     }

     /**
      * 从套接字读取一个最大的长度字节
      */
     public static function read(int $length, int $type = PHP_BINARY_READ, resource $socket = null) : string
     {
        $socket = self::arg('sock', $socket);
        return socket_read($socket, $length, $type);
     }

     /**
      * 从已经连接的套接字接收数据
      */
     public static function socket_recv($socket, $buf, $len, $flags)
     {

     }

     /**
      * 接收数据从一个套接字是否或不是它的连接方
      */
     public static function socket_recvfrom($socket, $buf, $len, $flags, $name)
     {

     }

     /**
      * 读取一条信息
      */
     public static function socket_recvmsg()
     {

     }

     /**
      * 返回该 select() 系统用一个明确规定的延时调用套接字给定的数组
      */
     public static function socket_select($read, $write, $except, $tv_sec)
     {

     }

     /**
      * 发送数据到一个连接的套接字
      */
     public static function socket_send($socket, $buf, $len, $flags)
     {

     }

     /**
      * 发送一条消息
      */
     public static function socket_sendmsg()
     {

     }

     /**
      * 发送一条消息到套接字，是否它已经连接或没有
      */
     public static function socket_sendto(resource $socket = null, string $buf, int $len, int $flags, string $addr, int $port = 0) : int
     {
        $socket = self::arg('sock', $socket);
        return socket_sendto($socket, $buf, $len, $flags, $addr, $port);
     }

     /**
      * 设置块模式在一个套接字资源上
      */
     public static function socket_set_block(resource $socket) : bool
     {
        return socket_set_block($socket);
     }

     /**
      * 设置非块模式为文件描述符 fd
      */
     public static function socket_set_nonblock(resource $socket) : bool
     {
        return socket_set_nonblock($socket);
     }

     /**
      * 设置套接字选项
      */
     public static function socket_set_option(resource $socket, int $level, int $optname, mixed $optval) : bool
     {
        return socket_set_option($socket, $level, $optname, $optval);
     }

     /**
      * 别名 socket_set_option
      */
     public static function socket_setopt()
     {

     }

     /**
      * 关闭一个套接字的接收、发送或两者
      */
     public static function socket_shutdown(resource $socket, int $how = 2) : bool
     {

     }

     /**
      * 返回套接字错误的字符描述物品
      */
     public static function strerror(int $errno = null) : string
     {
        if (null === $errno) {
            $errno = self::lastError();
        }
        return socket_strerror($errno);
     }

     /**
      * 写入一个套接字
      */
     public static function write(string $buffer, int $length = 0, resource $socket = null) : int
     {
        $socket = self::arg('sock', $socket);
        return socket_write($socket, $buffer, $length);
     }

     /**
      * 获取参数 $socket
      */
     public static function arg($name = 'sock', $value = null)
     {
        if (null !== $value) {
            return $value;
        }

        return self::$data[$name];
     }
}
