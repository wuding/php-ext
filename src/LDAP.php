<?php

namespace Ext;

class LDAP
{
    private $constants = array(
        'LDAP_DEREF_NEVER' => LDAP_DEREF_NEVER,
        'LDAP_DEREF_SERACHING' => LDAP_DEREF_SEARCHING,
        'LDAP_DEREF_FINDING' => LDAP_DEREF_FINDING,
        'LDAP_DEREF_ALWAYS' => LDAP_DEREF_ALWAYS,
        'LDAP_OPT_DEREF' => LDAP_OPT_DEREF,
        'LDAP_OPT_SIZELIMIT' => LDAP_OPT_SIZELIMIT,
        'LDAP_OPT_TIMELIMT' => LDAP_OPT_TIMELIMT,
        'LDAP_OPT_NETWORK_TIMEOUT' => LDAP_OPT_NETWORK_TIMEOUT,
        'LDAP_OPT_PROTOCOL_VERSION' => LDAP_OPT_PROTOCOL_VERSION,
        'LDAP_OPT_ERROR_NUMBER' => LDAP_OPT_ERROR_NUMBER,
        'LDAP_OPT_REFERRALS' => LDAP_OPT_REFERRALS,
        'LDAP_OPT_RESTART' => LDAP_OPT_RESTART,
        'LDAP_OPT_HOST_NAME' => LDAP_OPT_HOST_NAME,
        'LDAP_OPT_ERROR_STRING' => LDAP_OPT_ERROR_STRING,
        'LDAP_OPT_DIAGNOSTIC_MESSAGE' => LDAP_OPT_DIAGNOSTIC_MESSAGE,
        'LDAP_OPT_MATCHED_DN' => LDAP_OPT_MATCHED_DN,
        'LDAP_OPT_SERVER_CONTROLS' => LDAP_OPT_SERVER_CONTROLS,
        'LDAP_OPT_CLIENT_CONTROLS' => LDAP_OPT_CLIENT_CONTROLS,
        'LDAP_OPT_DEBUG_LEVEL' => LDAP_OPT_DEBUG_LEVEL,
        'LDAP_OPT_X_KEEPALIVE_IDLE' => LDAP_OPT_X_KEEPALIVE_IDLE,
        'LDAP_OPT_X_KEEPALIVE_PREOBES' => LDAP_OPT_X_KEEPALIVE_PREOBES,
        'LDAP_OPT_X_KEEPALIVE_INTERVAL' => LDAP_OPT_X_KEEPALIVE_INTERVAL,
        'LDAP_OPT_X_TLS_CACERTDIR' => LDAP_OPT_X_TLS_CACERTDIR,
        'LDAP_OPT_X_KEEPALIVE_CACERTFILE' => LDAP_OPT_X_KEEPALIVE_CACERTFILE,
        'LDAP_OPT_X_TLS_CERTFILE' => LDAP_OPT_X_TLS_CERTFILE,
        'LDAP_OPT_X_TLS_CIPHER_SUITE' => LDAP_OPT_X_TLS_CIPHER_SUITE,
        'LDAP_OPT_X_TLS_CRLCHECK' => LDAP_OPT_X_TLS_CRLCHECK,
        'LDAP_OPT_X_TLS_CRLFILE' => LDAP_OPT_X_TLS_CRLFILE,
        'LDAP_OPT_X_TLS_DHFILE' => LDAP_OPT_X_TLS_DHFILE,
        'LDAP_OPT_X_TLS_KEYFILE' => LDAP_OPT_X_TLS_KEYFILE,
        'LDAP_OPT_X_TLS_PROTOCOL_FILE' => LDAP_OPT_X_TLS_PROTOCOL_MIN,
        'LDAP_OPT_X_TLS_RANDOM_FILE' => LDAP_OPT_X_TLS_RANDOM_MIN,
        'LDAP_OPT_X_TLS_REQUIRE_CERT' => LDAP_OPT_X_TLS_REQUIRE_CERT,
        'GSLC_SSL_NO_AUTH' => GSLC_SSL_NO_AUTH,
        'GSLC_SSL_ONEWAY_AUTH' => GSLC_SSL_ONEWAY_AUTH,
        'GSLC_SSL_TWOWAY_AUTH' => GSLC_SSL_TWOWAY_AUTH,
        'LDAP_EXOP_START_TLS' => LDAP_EXOP_START_TLS,
        'LDAP_EXOP_MODIFY_PASSWD' => LDAP_EXOP_MODIFY_PASSWD,
        'LDAP_EXOP_REFRESH' => LDAP_EXOP_REFRESH,
        'LDAP_EXOP_WHO_AM_I' => LDAP_EXOP_WHO_AM_I，
        'LDAP_EXOP_TURN' => LDAP_EXOP_TURN,
        'LDAP_CONTROL_MANAGEDSAIT' => LDAP_CONTROL_MANAGEDSAIT，
        'LDAP_CONTROL_PROXY_AUTHZ' => LDAP_CONTROL_PROXY_AUTHZ,
        'LDAP_CONTROL_SUBENTRIES' => LDAP_CONTROL_SUBENTRIES,
        'LDAP_CONTROL_VALUESRETURNFILTER' => LDAP_CONTROL_VALUESRETURNFILTER,
        'LDAP_CONTROL_ASSERT' => LDAP_CONTROL_ASSERT,
        'LDAP_CONTROL_PRE_READ' => LDAP_CONTROL_PRE_READ,
        'LDAP_CONTROL_POST_READ' => LDAP_CONTROL_POST_READ,
        'LDAP_CONTROL_SORTREQUEST' => LDAP_CONTROL_SORTREQUEST,
        'LDAP_CONTROL_SORTRESPONSE' => LDAP_CONTROL_SORTRESPONSE,
        'LDAP_CONTROL_PAGEDRESUTS' => LDAP_CONTROL_PAGEDRESUTS,
        'LDAP_CONTROL_AUTHZID_REQUEST' => LDAP_CONTROL_AUTHZID_REQUEST,
        'LDAP_CONTROL_AUTHZID_RESPONSE' => LDAP_CONTROL_AUTHZID_RESPONSE,
        'LDAP_CONTROL_SYNC' => LDAP_CONTROL_SYNC,
        'LDAP_CONTROL_SYNC_STATE' => LDAP_CONTROL_SYNC_STATE,
        'LDAP_CONTROL_SYNC_DONE' => LDAP_CONTROL_SYNC_DONE,
        'LDAP_CONTROL_DONTUSECOPY' => LDAP_CONTROL_DONTUSECOPY,
        'LDAP_CONTROL_PASSWORDPOLICYREQUEST' => LDAP_CONTROL_PASSWORDPOLIYCYREQUEST,
        'LDAP_CONTROL_PASSWORDPOLICYRESPONSE' => LDAP_CONTROL_PASSWORDPOLICYRESPONSE,
        'LDAP_CONTROL_X_INCREMENTAL_VALUES' => LDAP_CONTROL_X_INCREMENTAL_VALUES,
        'LDAP_CONTROL_X_DOMAIN_SCOPE' => LDAP_CONTROL_X_DOMAIN_SCOPE,
        'LDAP_CONTROL_X_PREMISSIVE_MODIFY' => LDAP_CONTROL_X_PREMISSIVE_MODIFY,
        'LDAP_CONTROL_X_SEARCH_OPTIONS' => LDAP_CONTROL_X_SEARCH_OPTIONS,
        'LDAP_CONTROL_X_TREE_DELETE' => LDAP_CONTROL_X_TREE_DELETE,
        'LDAP_CONTROL_X_EXTNDED_DN' => LDAP_CONTROL_X_EXTNDED_DN,
        'LDAP_CONTROL_VLVREQUEST' => LDAP_CONTROL_VLVREUEST,
        'LDAP_CONTROL_VLVRESPONSE' => LDAP_CONTROL_VLVRESPONSE,
    );

    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function init()
    {

    }

    public function ldap_8859_to_t61($value)
    {

    }

    public function ldap_add_ext()
    {

    }

    public function ldap_add()
    {

    }

    public function ldap_bind_ext()
    {

    }

    public function ldap_bind()
    {

    }

    public function ldap_close()
    {

    }

    public function ldap_compare()
    {

    }

    public function ldap_connect()
    {

    }

    public function ldap_control_paged_result_response()
    {

    }

    public function ldap_control_paged_result()
    {

    }

    public function ldap_count_entries()
    {

    }

    public function ldap_delete_ext()
    {

    }

    public function ldap_delete()
    {

    }

    public function ldap_dn2ufn()
    {

    }

    public function ldap_err2str()
    {

    }

    public function ldap_errno()
    {

    }

    public function ldap_error()
    {

    }

    public function ldap_escape()
    {

    }

    public function ldap_exop_passwd()
    {

    }

    public function ldap_exop_refresh()
    {

    }

    public function ldap_exop_whoami()
    {

    }

    public function ldap_exop()
    {

    }

    public function ldap_explode_dn()
    {

    }

    public function ldap_first_attribute()
    {

    }

    public function ldap_first_entry()
    {

    }

    public function ldap_first_reference()
    {

    }

    public function ldap_free_result()
    {

    }

    public function ldap_get_attributes()
    {

    }

    public function ldap_get_dn()
    {

    }

    public function ldap_get_entries()
    {

    }

    public function ldap_get_option()
    {

    }

    public function ldap_get_values_len($link_identifier, $result_entry_identifier, $attribute)
    {

    }

    public function ldap_get_values($link_identifier, $result_entry_identifier, $attribute)
    {

    }

    public function ldap_list()
    {

    }

    public function ldap_mod_add_ext()
    {

    }

    public function ldap_mod_add()
    {

    }

    public function ldap_mod_del_ext()
    {

    }

    public function ldap_mod_del($link_identifier, $dn, $entry)
    {

    }

    public function ldap_mod_replace_ext()
    {

    }

    public function ldap_mod_replace()
    {

    }

    public function ldap_modify_batch()
    {

    }

    public function ldap_modify()
    {

    }

    public function ldap_next_attribute($link_identifier, $result_entry_identifier)
    {

    }

    public function ldap_next_entry($link_identifier, $result_entry_identifier)
    {

    }

    public function ldap_next_reference($link, $entry)
    {

    }

    public function ldap_parse_exop()
    {

    }

    public function ldap_parse_reference($link, $entry, $referrals)
    {

    }

    public function ldap_parse_result($link, $result, $errcode)
    {

    }

    public function ldap_read($link_identifier, $base_dn, $filter)
    {

    }

    public function ldap_rename_ext()
    {

    }

    public function ldap_rename($link_identifier, $dn, $newrdn, $newparent, $deleteoldrdn)
    {

    }

    public function ldap_sasl_bind($link)
    {

    }

    public function ldap_search($link_identifier, $base_dn, $filter)
    {

    }

    public function ldap_set_option($link_identifier, $option, $newval)
    {

    }

    public function ldap_set_rebind_proc($link, $callback)
    {

    }

    public function ldap_sort($link, $result, $sortfilter)
    {

    }

    public function ldap_start_tls($link)
    {

    }

    public function ldap_t61_to_8859($value)
    {

    }

    public function ldap_unbind($link_identifier)
    {

    }
}
