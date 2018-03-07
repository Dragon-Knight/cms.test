<?php

class Template
{
	private $_template = null;
	private $_base_dir = "pages/templates/";
	private $_data = array
	(
		"%TITLE%" => "",
		"%HEADS%" => "",
		"%BODY%" => "",
	);
		
	
	function __construct()
	{
		$this->_template = file_get_contents($this->_base_dir . "html_body.tpl");
		
		return;
	}
	
	function __destruct()
	{
		return;
	}
	
	public function SetTitle($title)
	{
		$this->_data["%TITLE%"] = $title;
		
		return;
	}
	
	public function SetHeads($heads)
	{
		$this->_data["%HEADS%"] .= (is_array($heads) === true) ? implode("\t\r\n", $heads) : $heads . "\t\r\n";
		
		return;	
	}
	
	public function SetBody($body)
	{
		$this->_data["%BODY%"] = $body;
		
		return;
	}
	
	public function Render($code = 200)
	{
		if($code != 200)
		{
			$error_page = file_get_contents($this->_base_dir . "html_" . $code . ".tpl");
			
			$this->_template = str_replace("%BODY%", $error_page, $this->_template);
		}
		
		return strtr($this->_template, $this->_data);
	}
}

?>