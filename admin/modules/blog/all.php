<?php 	

$pageTitle = 'Блог | Администрирование';

$pagination = pagination('posts', 10, 1);

$posts = R::find('posts', "ORDER BY id DESC {$pagination['sql_page_limit']}");

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/all.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>