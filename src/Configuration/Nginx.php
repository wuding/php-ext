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

	public function update()
	{

	}

	public function delete()
	{

	}

	public function read($filename = 'vhosts', $extension = '.conf', $folder = '/extra')
	{
		return include $this->constants['PREFIX_DIR'] . $folder . '/' . $filename . $extension;
	}



	public function sslConf()
	{

	}
}
