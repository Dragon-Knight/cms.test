<?php

class Template
{
	private $_template = null;
	private $_base_dir = "/pages/templates/";
	private $_data = array
	(
		"%TITLE%" => "Заголовок сайта",
		"%HEADS%" => "",
		"%BODY%" => "",
	),
		
	
	function __construct()
	{
		$this->_template = file_get_contents($this->_base_dir . "body.tpl");
		
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
	
	public function Render()
	{
		return strtr($this->_template, $this->_data);
	}
}

?>