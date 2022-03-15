<?php

namespace Ext;

class cURL extends _Abstract
{
    const VERSION = 20.5871106;

    // 常量
    public static $constStr = '';

    // 配置
    public static $ini = array(
        'curl.cainfo' => null,
    );

    // 运行时
    public static $handle = null;
    public static $multi_handle = null;

    // 错误
    public static $libcurl_errors = 'CURLE=OK,UNSUPPORTED_PROTOCOL,FAILED_INIT,URL_MALFORMAT,NOT_BUILT_IN,COULDNT_RESOLVE_PROXY,COULDNT_RESOLVE_HOST,COULDNT_CONNECT,WEIRD_SERVER_REPLY,REMOTE_ACCESS_DENIED,FTP_ACCEPT_FAILED,FTP_WEIRD_PASS_REPLY,FTP_ACCEPT_TIMEOUT;CURLE_FTP=WEIRD_PASV_REPLY,WEIRD_227_FORMAT,CANT_GET_HOST;CURLE=HTTP2,FTP_COULDNT_SET_TYPE,PARTIAL_FILE,FTP_COULDNT_RETR_FILE,QUOTE_ERROR,HTTP_RETURNED_ERROR,WRITE_ERROR,UPLOAD_FAILED,READ_ERROR,OUT_OF_MEMORY,OPERATION_TIMEDOUT,FTP_PORT_FAILED,FTP_COULDNT_USE_REST,RANGE_ERROR,HTTP_POST_ERROR,SSL_CONNECT_ERROR,BAD_DOWNLOAD_RESUME,FILE_COULDNT_READ_FILE,LDAP_CANNOT_BIND,LDAP_SEARCH_FAILED,FUNCTION_NOT_FOUND,ABORTED_BY_CALLBACK,BAD_FUNCTION_ARGUMENT,INTERFACE_FAILED,TOO_MANY_REDIRECTS,UNKOWN_OPTION,SETOPT_OPTION_SYNTAX,GOT_NOTHING,SSL_ENGINE_NOTFOUND,SSL_ENGINE_SETFAILED,SEND_ERROR,RECV_ERROR,SSL_CERTPROBLEM,SSL_CIPHER,PEER_FAILED_VERIFICATION,BAD_CONTENT_ENCODING,LDAP_INVALID_URL,FILESIZE_EXCEEDED,USE_SSL_FAILED,SEND_FAIL_REWIND,SSL_ENGINE_INITFAILED,LOGIN_DENIED,TFTP_NOTFOUND,TFTP_PERM,REMOTE_DISK_FULL,TFTP_ILLEGAL,TFTP_UNKNOWNID,REMOTE_FILE_EXISTS,TFTP_NOSUCHUSER,CONV_FAILED,CONV_REQD,SSL_CACERT_BADFILE,REMOTE_FILE_NOT_FOUND,SSH,SSL_SHUTDOWN_FAILED,AGAIN,SSL_CRL_BADFILE,SSL_ISSUER_ERROR,FTP_PRET_FAILED,RTSP_CSEQ_ERROR,RTSP_SESSION_ERROR,FTP_BAD_FILE_LIST,CHUNK_FAILED,NO_CONNECTION_AVAILABLE,SSL_PINNEDPUBKEYNOTMATCH,SSL_INVALIDCERTSTATUS,HTTP2_STREAM,RECURSIVE_API_CALL,AUTH_ERROR,HTTP3,QUIC_CONNECT_ERROR,SSL_CLIENTCERT';

    public static $libcurl_error_codes = array(
        'CURLE_NOT_BUILT_IN' => 4,
        'CURLE_REMOTE_ACCESS_DENIED' => 9,
        'CURLE_FTP_ACCEPT_FAILED' => 10,
        'CURLE_FTP_ACCEPT_TIMEOUT' => 12,
        'CURLE_HTTP2' => 16,
        'CURLE_FTP_COULDNT_SET_TYPE' => 17,
        'CURLE_QUOTE_ERROR' => 21,
        'CURLE_UPLOAD_FAILED' => 25,
        'CURLE_RANGE_ERROR' => 33,
        'CURLE_INTERFACE_FAILED' => 45,
        'CURLE_UNKOWN_OPTION' => 48,
        'CURLE_SETOPT_OPTION_SYNTAX' => 49,
        'CURLE_PEER_FAILED_VERIFICATION' => 60,
        'CURLE_USE_SSL_FAILED' => 64,
        'CURLE_SEND_FAIL_REWIND' => 65,
        'CURLE_SSL_ENGINE_INITFAILED' => 66,
        'CURLE_LOGIN_DENIED' => 67,
        'CURLE_TFTP_NOTFOUND' => 68,
        'CURLE_TFTP_PERM' => 69,
        'CURLE_REMOTE_DISK_FULL' => 70,
        'CURLE_TFTP_ILLEGAL' => 71,
        'CURLE_TFTP_UNKNOWNID' => 72,
        'CURLE_REMOTE_FILE_EXISTS' => 73,
        'CURLE_TFTP_NOSUCHUSER' => 74,
        'CURLE_CONV_FAILED' => 75,
        'CURLE_CONV_REQD' => 76,
        'CURLE_REMOTE_FILE_NOT_FOUND' => 78,
        'CURLE_SSL_SHUTDOWN_FAILED' => 80,
        'CURLE_AGAIN' => 81,
        'CURLE_SSL_CRL_BADFILE' => 82,
        'CURLE_SSL_ISSUER_ERROR' => 83,
        'CURLE_FTP_PRET_FAILED' => 84,
        'CURLE_RTSP_CSEQ_ERROR' => 85,
        'CURLE_RTSP_SESSION_ERROR' => 86,
        'CURLE_FTP_BAD_FILE_LIST' => 87,
        'CURLE_CHUNK_FAILED' => 88,
        'CURLE_NO_CONNECTION_AVAILABLE' => 89,
        'CURLE_SSL_INVALIDCERTSTATUS' => 91,
        'CURLE_HTTP2_STREAM' => 92,
        'CURLE_RECURSIVE_API_CALL' => 93,
        'CURLE_AUTH_ERROR' => 94,
        'CURLE_HTTP3' => 95,
        'CURLE_QUIC_CONNECT_ERROR' => 96,
        'CURLE_SSL_CLIENTCERT' => 98,
    );

    public function __construct($url = null)
    {
        if ($url) {
            self::init($url);
        }
    }

    /*
    +---------------------------------------------+
    + 初始化与执行、关闭
    +---------------------------------------------+
    */

    public static function init($url = null)
    {
        $ch = self::$handle = curl_init($url);
        return $ch;
    }

    public static function exec($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $exec = curl_exec($ch);
        return $exec;

    }

    // 没有返回值
    public static function close($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $close = curl_close($ch);
        return $close;
    }

    public static function multiInit()
    {
        $mh = self::$multi_handle = curl_multi_init();
        return $mh;
    }

    public static function multiExec($multi_handle = null, &$still_running = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $exec = curl_multi_exec($mh, $still_running);
        return $exec;
    }

    public static function multiClose($multi_handle = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $close = curl_multi_close($mh);
        return $close;
    }

    public static function errno($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $errno = curl_errno($ch);
        return $errno;
    }

    public static function error($handle = null)
    {
        $ch = $handle ?: self::$handle;
        $error = curl_error($ch);
        return $error;
    }

    /*
    +---------------------------------------------+
    + 设置选项
    +---------------------------------------------+
    */

    public static function setOpt($handle = null, $option = null, $value = null, $empty = null)
    {
        if ($empty && !$value) {
            return false;
        }
        $ch = $handle ?: self::$handle;
        $set = curl_setopt($ch, $option, $value);
        return $set;
    }

    public static function setOptArray($handle = null, $options = null, $value = null, $empty = null)
    {
        if ($empty && !$value) {
            return false;
        }
        $ch = $handle ?: self::$handle;
        $set = curl_setopt_array($ch, $options);
        return $set;
    }

    /*
    +---------------------------------------------+
    + 批处理
    +---------------------------------------------+
    */

    public static function multiAddHandle($multi_handle = null, $handle = null)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $ch = $handle ?: self::$handle;
        $add = curl_multi_add_handle($mh, $ch);
        return $add;
    }

    public static function multiSelect($multi_handle = null, $timeout = 1.0)
    {
        $mh = $multi_handle ?: self::$multi_handle;
        $sel = curl_multi_select($mh, $timeout);
        return $sel;
    }

    /*
    +---------------------------------------------+
    + 自定义
    +---------------------------------------------+
    */

    public static function simulate($var_array = null, $post_fields = null, $http_header = null, $header = null)
    {
        $return_all = null;
        $option = array();
        if (is_array($var_array)) {
            extract($var_array);
        }

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        );
        foreach ($option as $key => $value) {
            $options[$key] = $value;
        }
        $opts = array(
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_fields,
        );
        $setArr = self::setOptArray(null, $options);
        $setHeader = self::setOpt(null, CURLOPT_HTTPHEADER, $http_header, true);
        $setPost = self::setOptArray(null, $opts, $post_fields, true);

        $exec = self::exec();
        $close = self::close();
        return $return_all ? get_defined_vars() : $exec;
    }

    public static function getInfo()
    {
        $options = array(
            CURLOPT_NOBODY => true,
        );
        $setArr = self::setOptArray(null, $options);

        $exec = self::exec();
        $errno = self::errno();
        if ($errno) {
            $error = self::error();
            var_dump($error);
            exit;
        }

        $info = curl_getinfo(self::$handle);
        $close = self::close();
        return $info;
    }
}
