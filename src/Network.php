<?php

/**
 * 网络
 */
namespace Ext;

class Network
{
    private $constants == [];

    public function __construct()
    {


    }

    public function init()
    {
        self::$constants = [
        ];
    }

    /**
     * 给指定的主机/域名或者 IP 地址做 DNS 通信检查
     */
    public static function checkdnsrr($host)
    {

    }

    /**
     * 关闭系统日志链接
     */
    public static function closelog()
    {

    }

    /**
     * 初始化所有 syslog 相关变量
     */
    public static function define_syslog_variables()
    {

    }

    /**
     * checkdnsrr 别名
     */
    public static function dns_check_record()
    {

    }

    /**
     * getmxrr 别名
     */
    public static function dns_get_mx()
    {

    }

    /**
     * 获取指定主机的 DNS 记录
     */
    public static function dns_get_record($hostname)
    {

    }

    /**
     * 打开一个网络连接或者一个 Unix 套接字连接
     */
    public static function fsockopen($hostname)
    {

    }

    /**
     * 获取指定的 IP 地址对应的主机名
     */
    public static function gethostbyaddr($ip_address)
    {

    }

    /**
     * 返回主机名对应的 IPv4 地址
     */
    public static function gethostbyname($hostname)
    {

    }

    /**
     * 获取互联网主机名对应的 IPv4 地址列表
     */
    public static function gethostbynamel($hostname)
    {

    }

    /**
     * 获取主机名
     */
    public static function gethostname()
    {

    }

    /**
     * 获取互联网主机名对应的 MX 记录
     */
    public static function getmxrr($hostname, $mxhosts)
    {

    }

    /**
     * 获取协议版本数联合用协议名
     */
    public static function getprotobyname($name)
    {

    }

    /**
     * 用协议版本数获取相关联的协议名
     */
    public static function getprotobynumber($number)
    {

    }

    /**
     * 获取互联网服务协议对应的端口
     */
    public static function getservbyname($service, $protocol)
    {

    }

    /**
     * 获取互联网服务每个 corresponds 到端口和协议
     */
    public static function getservbyport($port, $protocol)
    {

    }

    /**
     * 调用一个 header 函数
     */
    public static function headerRegisterCallback()
    {
        return header_register_callback();
    }

    /**
     * 删除之前设置的 HTTP 头
     */
    public static function header_remove()
    {
        return header_remove();
    }

    /**
     * 发生原生消息头
     */
    public static function header($string)
    {
        return header($string);
    }

    /**
     * 返回已经发送的 HTTP 响应头（或者准备发送的）
     */
    public static function headers_list()
    {
        return headers_list();
    }

    /**
     * 检测 HTTP 头是否已经发送
     */
    public static function headers_sent()
    {
        return headers_sent();
    }

    /**
     * 获取/设置响应的 HTTP 状态码
     */
    public static function http_response_code($code)
    {

    }

    /**
     * 转换一个压缩包的网络地址到一个人类可读的重现
     */
    public static function inet_ntop($in_addr)
    {

    }

    /**
     * 转换一个人类可读的 IP 地址到它包装的 in_addr representation
     */
    public static function inet_pton($address)
    {

    }

    /**
     * 将 IPv4 的字符串互联网协议转换成长整型数字
     */
    public static function ip2long($ip_address)
    {

    }

    /**
     * 将长整型转化为字符串形式带点的互联网标准格式地址
     */
    public static function long2ip($proper_address)
    {

    }

    /**
     * Open conncetion to system logger
     */
    public static function openlog($ident, $option, $facility)
    {

    }

    /**
     * 打开一个持久的网络连接或者 Unix 套接字连接
     */
    public static function pfsockopen($hostname)
    {

    }

    /**
     * 发送曲奇
     */
    public static function setcookie($name)
    {

    }

    /**
     * 发送未经 URL 编码的饼干
     */
    public static function setrawcookie($name)
    {

    }

    /**
     * stream_get_meta_data 别名
     */
    public static function socket_get_status()
    {

    }

    /**
     * stream_set_blocking 别名
     */
    public static function socket_set_blocking()
    {

    }

    /**
     * stream_set_timeout 别名
     */
    public static function socket_set_timeout()
    {

    }

    /**
     * 生成一个系统日志信息
     */
    public function sysLog(int $prrority, string $message) : bool
    {
        return syslog($priority, $message);
    }
}
