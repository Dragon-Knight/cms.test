<?php

require_once("class.Template.php");

class Response
{
	private $_config = array
	(
		"mode" => "html",
		"gzip" => true
	);
	private $_content = array
	(
		"title" => "",
		"heads" => "",
		"body" => "",
	);
	
	function __construct()
	{
		return;
	}
	
	function __destruct()
	{
		return;
	}
	
	public function SetConfig($key, $value)
	{
		$this->_config[$key] = $value;
	}
	
	public function SetContent($key, $value)
	{
		$this->_content[$key] = $value;
	}
	
	public function Render($code = 200)
	{
		$result = "";
		
		switch($this->_config['mode'])
		{
			case "html":
			{
				$tpl = new Template();
				$tpl->SetTitle($this->_content['title']);
				$tpl->SetHeads($this->_content['heads']);
				$tpl->SetBody($this->_content['body']);
				$result = $tpl->Render($code);
				
				break;
			}
			case "json":
			{
				break;
			}
			case "raw":
			{
				break;
			}
		}
		
		if($this->_config['gzip'] === true)
		{
			header("Content-Encoding: gzip");
			$result = gzencode($result);
		}
		
		echo $result;
	}
	
	//public function
	
}

?>