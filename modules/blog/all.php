<?php 	

$pageTitle = 'Блог | ' . $settings['site_title'];
$pagination = pagination('posts', 6);

// Выводим все посты
$posts = R::find('posts', "ORDER BY id DESC {$pagination['sql_page_limit']}");

// Центральный шаблон для модуля
include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/blog/all.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>