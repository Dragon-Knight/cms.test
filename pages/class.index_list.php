<?php

class index_list extends core
{
	protected function GetInfo()
	{
		// Метод описывает текущую страницу.. Где находится, для чего нужна. Нужна для генерации меню, выдача прав и т.д.
		return array
		(
			"menu" => array("Главная" => "Список"), // Описываю меню. Т.е. Главный раздел "Главная" и в нём страница "Список".
			"info" => "Страница списка чего либо" // Описываю информацию страницы.
			// Другие поля, которые могут пригодится потом.
		);
	}
	
	protected function CheckPermission()
	{
		// Тут я описываю и проверяю логику доступа пользователя к этой странице.
		// Если верну true, то доступ разрешён и показываем страницу, если false, то показываем 403.
	}
	
	protected function Page()
	{
		// Тут сама страница.
	}
	
	// Вообще ещё потом хочу разделить логику от разметки, т.е. например в Page() мы показываем форму, а когда нажали Отправить форму, то попадаем в метод Post().
}

?>