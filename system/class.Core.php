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
		
		$class_name = $this->_SYS['request']->GetClass();
		
		if(file_exists("pages/class." . $class_name . ".php") === true)
		{
			require_once("pages/class." . $class_name . ".php");
			
			$page = new $class_name();
			
			$this->_SYS['response']->SetConfig("mode", $page->GetInfo('mode'));
			$this->_SYS['response']->SetContent("title", $page->GetInfo('title'));
			$this->_SYS['response']->SetContent("heads", $page->GetInfo('heads'));
			
			if( $page->CheckPermission() === true)
			{
				$method_name = $this->_SYS['request']->GetMethod();
				
				$reflection = new ReflectionClass($page);
				$reflectionMethod = $reflection->getMethod($method_name);
				$parameters = array();
				foreach($reflectionMethod->getParameters() as $parameter)
				{
					$value = $this->_SYS['request']->Get(strtoupper($method_name), $parameter->getName());
					if($value !== null)
					{
						$parameters[] = $value;
					}
					else
					{
						try
						{
							$default = $parameter->getDefaultValue();
							$parameters[] = $default;
						}
						catch(Exception $e)
						{
							throw new Exception("Parameter [" . $parameter->getName() . "] must exist in request.");
						}
					}
				}
				
				$response = call_user_func_array( array($page, $method_name), $parameters);
				
				$this->_SYS['response']->SetContent("body", $response);
				$this->_SYS['response']->Render(200);
			}
			else
			{
				$this->_SYS['response']->SetContent("body", "aaaaaaaaaaaaaaaaaaaaaa");
				$this->_SYS['response']->Render(403);
			}
		}
		else
		{
			$this->_SYS['response']->SetContent("body", "aaaaaaaaaaaaaaaaaaaaaa");
			$this->_SYS['response']->Render(404);
		}
		
		return;
	}
	
	function __destruct()
	{
		return;
	}
}

?>