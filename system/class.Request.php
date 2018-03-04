<?php

class Request
{
	private $_data = array();
	
	public function __construct()
	{
		$this->_data['GET'] = $_GET;
		$this->_data['POST'] = $_POST;
		
		return;
	}
	
	public function Get($section, $key, $pattern, $default = null)
	{
		$result = $default;
		
		if(array_key_exists($key, $this->_data[$section]) === true)
		{
			if(preg_match($pattern, $this->_data[$section][$key]) === 1)
			{
				$result = $this->_data[$section][$key];
			}
		}
		
		return $result;
	}
	
	public function GetMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}

?>