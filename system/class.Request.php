<?php

class Request
{
	private $_data = array();
	
	public function __construct()
	{
		$this->_data['SERVER'] = $_SERVER;
		$this->_data['GET'] = $_GET;
		$this->_data['POST'] = $_POST;
		$this->_data['FILES'] = $_FILES;
		$this->_data['COOKIE'] = $_COOKIE;
		$this->_data['SESSION'] = $_SESSION;
		
		return;
	}
	
	public function Get($section, $key, $default = null)
	{
		$result = $default;
		
		if(array_key_exists($key, $this->_data[$section]) === true)
		{
			$result = $this->_data[$section][$key];
		}
		
		return $result;
	}
	
	/*
		Получаем из запроса нужное имя класса страницы.
	*/
	public function GetClass()
	{
		$result = array("index", "index");
		
		if(preg_match("/^[a-z]+$/", $this->_data['GET']['page']) === 1)
		{
			$result[0] = $this->_data['GET']['page'];
		}
		
		if(preg_match("/^[a-z]+$/", $this->_data['GET']['mode']) === 1)
		{
			$result[1] = $this->_data['GET']['mode'];
		}
		
		return implode("_", $result);
	}
	
	/*
		Получаем имя метода для вызова.
	*/
	public function GetMethod()
	{
		return ucfirst(strtolower($this->_data['SERVER']['REQUEST_METHOD']));
	}
}

?>