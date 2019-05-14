<?php
/**
 * 原生语言支持
 */
namespace Ext;

class Gettext
{
    private $data = [
        'domain' => null,
        'category' => null,
    ];

    public function __construct()
    {

    }

    /**
     * 明确规定这字符编码在每个消息从这域消息目录将被返回
     *
     * @param      string  $domain   The domain
     * @param      string  $codeset  The codeset
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function bindTextdomainCodeset(string $domain, string $codeset) : string
    {
        return bind_textdomain_codeset($domain, $codeset);
    }

    /**
     * 设置一个域的该路径
     *
     * @param      string  $domain     The domain
     * @param      string  $directory  The directory
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function bindTextDomain(string $domain, string $directory) : string
    {
        return bindtextdomain($domain, $directory);
    }

    /**
     * 查找覆盖单个域
     *
     * @param      string  $domain    The domain
     * @param      string  $message   The message
     * @param      string  $category  The category
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function dc(string $domain, string $message, string $category) : string
    {
        return dcgettext($domain, $message, $category);
    }

    /**
     * dcgettext 的复数版本
     *
     * @param      string   $domain    The domain
     * @param      string   $msgid1    The msgid 1
     * @param      string   $msgid2    The msgid 2
     * @param      integer  $n         { parameter_description }
     * @param      integer  $category  The category
     *
     * @return     string   ( description_of_the_return_value )
     */
    public static function dcn(string $domain, string $msgid1, string $msgid2, int $n, int $category) : string
    {
        return dcngettext($domain, $msgid1, $msgid2, $n, $category);
    }

    /**
     * 覆盖当前的域
     *
     * @param      string  $domain   The domain
     * @param      string  $message  The message
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function d(string $domain, string $message) : string
    {
        return dgettext($domain, $message);
    }

    /**
     * dgettext 的复数版本
     *
     * @param      string   $domain  The domain
     * @param      string   $msgid1  The msgid 1
     * @param      string   $msgid2  The msgid 2
     * @param      integer  $n       { parameter_description }
     *
     * @return     string   ( description_of_the_return_value )
     */
    public static function dn(string $domain, string $msgid1, string $msgid2, int $n) : string
    {
        return dngettext($domain, $msgid1, $msgid2, $n);
    }

    /**
     * 从当前域查找一条消息
     *
     * @param      string  $message  The message
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function _(string $message) : string
    {
        return gettext($message);
    }

    /**
     * gettext 的复数版本
     *
     * @param      string   $msgid1  The msgid 1
     * @param      string   $msgid2  The msgid 2
     * @param      integer  $n       { parameter_description }
     *
     * @return     string   ( description_of_the_return_value )
     */
    public static function n(string $msgid1, string $msgid2, int $n) : string
    {
        return ngettext($msgid1, $msgid2, $n);
    }

    /**
     * 设置默认域
     *
     * @param      string  $text_domain  The text domain
     *
     * @return     string  ( description_of_the_return_value )
     */
    public static function textDomain(string $text_domain = null) : string
    {
        return textdomain($text_domain);
    }
}