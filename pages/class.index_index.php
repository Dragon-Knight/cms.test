<?php

class index_index extends Pages
{
	protected function GetInfo()
	{
		return array
		(
			"auth" => true,
			"methods" => array
			(
				"GET" => array
				(
					"id" => array(false, "int")
				),
				"POST" => array
				(
					"id" => array(true, "int"),
					"name" => array(true, "string"),
					"phone" => array(true, "string")
				)
			),
			"menu" => array("Главная" => "Главная"), // Описываю меню. Т.е. Главный раздел "Главная" и в нём страница "Главная".
			"info" => "Страница общей информации" // Описываю информацию страницы.
			// Другие поля, которые могут пригодится потом.
		);
	}
	
	protected function CheckPermission()
	{
		// Тут я описываю и проверяю логику доступа пользователя к этой странице.
		// Если верну true, то доступ разрешён и показываем страницу, если false, то показываем 403.
	}

	protected function Get($data)
	{
		$content  = "<h1>protected function Get()</h1><br>\r\n";
		$content .= "<pre>" . print_r($data, true) . "</pre>";
		
		return $content;
	}
	
	protected function Post($data)
	{
		$content  = "<h1>protected function Post()</h1><br>\r\n";
		$content .= "<pre>" . print_r($data, true) . "</pre>";
		
		return $content;
	}
	
	
	
}

?>