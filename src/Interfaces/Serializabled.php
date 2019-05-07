<?php

/**
 * 序列化接口
 */

namespace Ext\Interfaces;

use Ext\Variable;
use Serializable;

class Serializabled implements Serializable
{
	private $data;

	public function __construct($var)
	{
		$this->data = $var;
	}

	public function serialize()
	{
		return $value = Variable::serialize($this->data);
	}

	public function unserialize($data)
	{
		$this->data = Variable::unserialize($data);
	}

	public function getData()
	{
		return $this->data;
	}
}