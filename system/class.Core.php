<?php

require_once("class.Request.php");
require_once("class.Response.php");
require_once("class.Pages.php");

class Core
{
	private $_SYS = array();
	
	
	function __construct()
	{
		$this->_SYS['request'] = new Request();
		$this->_SYS['response'] = new Response();
		
		$class_name = $this->_SYS['request']->GetPageName();
		
		require_once("pages/class." . $class_name . ".php");
		
		$page = new $class_name();
		
		$this->_SYS['response']->SetConfig("mode", $page->GetInfo('mode'));
		$this->_SYS['response']->SetContent("title", $page->GetInfo('title'));
		$this->_SYS['response']->SetContent("heads", $page->GetInfo('heads'));
		
		if( $page->CheckPermission() === true)
		{
			$this->_SYS['response']->SetContent("body", $page->Get("q"));
			$this->_SYS['response']->Render(200);
		}
		else
		{
			$this->_SYS['response']->SetContent("body", "aaaaaaaaaaaaaaaaaaaaaa");
			$this->_SYS['response']->Render(403);
		}
		
		return;
	}
	
	function __destruct()
	{
		return;
	}
}

?>