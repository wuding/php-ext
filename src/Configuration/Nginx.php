<?php

namespace Ext\Configuration;

class Nginx
{
    private $constants = array(
        'PREFIX_DIR' => 'D:/env/win/ProgramData/nginx/conf',
        'NGINX_VERSION' => '',
    );

    public function create($basename = 'ssl.conf', $server = array(), $location = array())
    {
        return include $this->constants['PREFIX_DIR'] . '/' . $basename;
    }

    public function update($basename = 'ssl.conf', $config = array())
    {
        # return include $this->constants['PREFIX_DIR'] . '/' . $basename;
        if (is_array($config) && isset($config[0])) {
            foreach ($config as $conf) {
                echo $this->sslConf($conf);
            }
            exit;
        }
        echo $this->sslConf($config);
    }

    public function delete()
    {

    }

    public function read($filename = 'vhosts', $extension = '.conf', $folder = '/extra')
    {
        return include $this->constants['PREFIX_DIR'] . $folder . '/' . $filename . $extension;
    }

    public function sslConf($config = null)
    {
        extract($config);

$listen = implode(PHP_EOL, $listen);

$server_name = $server_name ? 'server_name ' . $server_name : '';

$ssl_certificate = array();
foreach ($ssl_certificates as $ssl_key => $ssl_value) {
    if ('__' != $ssl_key) {
        $ssl_certificate[] = 'ssl_certificate' . $ssl_key . ' ' . $ssl_certificates['__'] . '/' . $ssl_value;
    }
}

$ssl_certificate = implode(PHP_EOL, $ssl_certificate);
$server_ssl = !$ssl_certificates['__'] ? '' : <<<HEREDOC
$ssl_certificate;

    ssl_session_cache    shared:SSL:1m;
    ssl_session_timeout  5m;

    ssl_ciphers  HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers  on;
HEREDOC;

return $server_content = <<<HEREDOC
server {
    $listen;
    $server_name;

    $server_ssl

    location / {
        root   $root;
        index $index;
        autoindex on;
    }
}
HEREDOC;
    }
}
