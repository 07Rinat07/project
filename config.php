<?php

// DB SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER', 'root');
define('DB_PASS', '');

if ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}

// Хост сайта - используется для ссылок в браузере <a href="...">
define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');

// Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__) . '/');

// Доп настройки
define('SITE_NAME', 'Сайт Digital Nomad');
define('SITE_EMAIL', 'info@project.com');

?>