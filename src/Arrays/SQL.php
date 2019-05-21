<?php

namespace Ext\Arrays;

class SQL
{
	public function __construct($db_name = null, $table_name = null, $fileds = null, $values = null)
	{
	}
	
	public function __destruct()
	{
	}
	
	public function __call($name, $arguments)
	{
	}
	
	public static function __callStatic($name, $arguments)
	{
		$methodName = ucwords(str_replace('_', ' ', $name));
		$methodName = str_replace(' ', '', lcfirst($methodName));
		$instance = new static;
		return $instance->$methodName(implode(', ', $arguments));
	}
	
	public function init()
	{
	}
	
	public function insertInto($table_name, $fields = ['id', 'name', 'title'], $values = [[0, 'Name', '标题']])
	{
		print_r(get_defined_vars());
		$columns = implode('`,`', $fields);
		$rows = [];
		foreach ($values as $val) {
			$i = 0;
			foreach ($fields as $fld => $field) {
				$val[$fld] = isset($val[$fld]) ? $val[$fld] : '';
			}
			$row = implode("', '", $val);
			$rows[] = "('$row')";
		}
		$rows = implode(',', $rows);
		return $sql_template = "INSERT INTO $table_name (`$columns`) VALUES $rows;";
	}
}
