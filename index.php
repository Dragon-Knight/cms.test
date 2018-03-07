<?php

require_once("system/class.Core.php");

$core = new Core();

/*
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . $file;

    if (file_exists( $path ))
    {
        require_once( $path );
    }
});

Bootstrap::execute(
    Request::getInstance()->get('page'),
    Request::getInstance()->get('mode')
);

// Точка входа.
// Должна
//	Принимать на вход параметры например index.php?page=index&mode=list&...
//	Генерировать основное меню и подменю раздела.
*/



?>