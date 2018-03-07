<?php

class Pages
{
	public function GetInfo($key, $default = null)
	{
		return (array_key_exists($key, $this->_config) === true) ? $this->_config[$key] : $default;
	}
}

?>