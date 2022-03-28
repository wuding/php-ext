<?php

namespace Ext;

class GnuPG
{
    const VERSION = '22.3.28';

    public $predefiend_constants = array(
        'int' => array(
            'GNUPG_SIG_MODE_NORMAL',
            'GNUPG_SIG_MODE_DETACH',
            'GNUPG_SIG_MODE_CLEAR',
            'GNUPG_VALIDITY_UNKNOWN',
            'GNUPG_VALIDITY_UNDEFINED',
            'GNUPG_VALIDITY_NEVER',
            'GNUPG_VALIDITY_MARGINAL',
            'GNUPG_VALIDITY_FULL',
            'GNUPG_VALIDITY_ULTIMATE',
            'GNUPG_PROTOCOL_OpenPGP',
            'GNUPG_PROTOCOL_CMS',
            'GNUPG_SIGSUM_GREEN',
            'GNUPG_SIGSUM_RED',
            'GNUPG_SIGSUM_KEY_REVOKED',
            'GNUPG_SIGSUM_KEY_EXPIRED',
            'GNUPG_SIGSUM_KEY_MISSING',
            'GNUPG_SIGSUM_SIG_EXPIRED',
            'GNUPG_SIGSUM_CRL_MISSING',
            'GNUPG_SIGSUM_CRL_TOO_OLD',
            'GNUPG_SIGSUM_BAD_POLICY',
            'GNUPG_SIGSUM_SYS_ERROR',
            'GNUPG_ERROR_WARING',
            'GNUPG_ERROR_EXCEPTION',
            'GNUPG_ERROR_SILENT',
        );
    );

    public $pages = array(
        'refman' => array(
            'gnupg_cleardecryptkeys' => array(
                'verinfo' => array(
                    'PECL gnupg' => array(
                        '>=' => 0.5,
                    ),
                ),
                'purpose' => 'Removes all kesy which were set for decryption before',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'gnupg_cleardecryptkeys(resource $identifier): bool',
                        ),
                    ),
                    'Parameters' => array(
                        'identifier' => null
                    ),
                    'Return Values' => array(
                        true => 'on success',
                        false => 'on failure',
                    ),
                    'Examples' => array(
                        'Procedural gnupg_cleardecryptkeys() example',
                        'OO gnupg_cleardecryptkeys() example',
                    ),
                ),
            ),
        ),
    );

    public $runtime_configuration  = null;

    public static $parameters = array(
        '' => array(
            'resource' => array(
                'identifier' => null,
            ),
        ),
    );

    public static function _getResourceIdentifier($identifier = null)
    {
        if (null === $identifier) {
            $identifier = self::$parameters['']['resource']['identifier'];
        }
        return $identifier;
    }

    public static function clearDecryptKeys($identifier = null)
    {
        $identifier = self::_getResourceIdentifier($identifier);
        $return_values = gnupg_cleardecryptkeys($identifier);
        return $return_values;
    }
}
