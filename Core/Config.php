<?php

class Config
{
	private static $config = null;
	
	public static function get($value, $default = null)
	{
		if(static::$config === null)
		{
			static::$config = require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");
		}
		
		return array_key_exists($value, static::$config)
            ? static::$config[$value]
            : $default;
	}
}