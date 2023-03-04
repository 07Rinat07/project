<?php 	

$pageTitle = 'Категории блога | Администрирование';

$pagination = pagination('categories', 10, 1);

$categories = R::find('categories', "ORDER BY id DESC {$pagination['sql_page_limit']}");

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/categories/all.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>