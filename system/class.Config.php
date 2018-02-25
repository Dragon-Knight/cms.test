<?php

class Config
{
	private static $_config = null;
	
	public static function Get($value, $default = null)
	{
		if(static::$_config === null)
		{
			require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
			
			static::$_config = $_CFG;
		}
		
		return array_key_exists($value, static::$_config) ? static::$_config[$value] : $default;
	}
}

?>