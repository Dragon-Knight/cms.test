<?php

class Response
{
	private $_template_dir = "/pages/templates/";
	private $_content = "";
	private $_mode = null;
	
	
	function __construct($mode)
	{
		$this->_mode = $mode;
		
		return;
	}
	
	function __destruct()
	{
		return;
	}
	
	public function SetContent($content)
	{
		$this->_content = $content;
	}
	
	public function Render()
	{
		switch($this->_mode)
		{
			case "html":
			{
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
	}
}

?>