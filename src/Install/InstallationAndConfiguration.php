<?php

namespace Ext\Install;

class InstallationAndConfiguration
{
    const VERSION = '22.3.25';

    public $chunklist = array(
        'General Installation Considerations',
        'Installation on Unix systems' => array(
            'Apache 2.x on Unix systems',
            'Nginx 1.4.x on Unix systems',
            'Lighttpd 1.4 on Unix systems',
            'LiteSpeed Web Server/OpenLiteSpeed Web Server on Unix systems',
            'CGI and command line setups',
            'OpenBSD installation notes',
            'Solaris specific installation tips',
            'Debian GNU/Linux installation notes',
        ),
        'Installation on macOS' => array(
            'Using Packages',
            'Using the bundled PHP prior to macOS Monterey',
            'Compiling PHP on macOS',
        ),
        'Installation on Windows systems' => array(
            'Install Requirements',
            'PECL',
            'PHP Installer Tools on Windows',
            'Recommended Configuration on Windows systems',
            'Manual PHP Installation on Windows',
            'Building from source',
            'Command Line PHP on Microsoft Windows',
            'Apache 2.x on Microsoft Windows',
            'Troubleshooting PHP on Windows',
        ),
        'Installation on Cloud Computing platforms' => array(
            'Azure App Services',
            'Amazon EC2',

        ),
        'FastCGI Process Manager (FPM)' => array(
            'Installation',
            'Configuration',
        ),
        'Installation of PECL extensions' => array(
            'Introduction to PECL Installations',
            'Downloading PECL Installations',
            'Installing a PHP extension on Windows',
            'Compiling shared PECL extensions with the pecl command',
            'Compiling shared PECL extensions with phpize',
            'php-config',
            'Compiling PECL extensions statically into PHP',
        ),
        'Problems?' => array(
            'Read the FAQ',
            'Other problems',
            'Bug reports',
        ),
        'Runtime Configuration' => array(
            'The configuration file',
            '.user.ini files',
            'Where a configuration setting may be set',
            'How to change configuration settings',
        ),
    );
}
