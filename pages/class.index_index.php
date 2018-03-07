<?php

class index_index extends Pages
{
	protected $_config = array
	(
		"auth" => true,					// Требуется авторизация.
		"mode" => "html",				// Ответ страницы.
		"title" => "Главная страница",	// Заголовок страницы, если ответ = html.
		"heads" => array(),				// Дополнительные теги в <head>, если ответ = html.
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
	
	public function CheckPermission()
	{
		// Тут я описываю и проверяю логику доступа пользователя к этой странице.
		// Если верну true, то доступ разрешён и показываем страницу, если false, то показываем 403.
		return true;
	}

	public function Get($data)
	{
		$content  = "<h1>protected function Get()</h1><br>\r\n";
		$content .= "<pre>" . print_r($data, true) . "</pre>";
		
		return $content;
	}
	
	public function Post($data)
	{
		$content  = "<h1>protected function Post()</h1><br>\r\n";
		$content .= "<pre>" . print_r($data, true) . "</pre>";
		
		return $content;
	}
	
	
	
}

?>