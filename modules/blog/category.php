<?php 	

$pagination = pagination('posts', 6, 1, [ 'category = ?', [$uriGetCat] ]);

$posts = R::findLike('posts', [ 'category' => [$uriGetCat] ] , "ORDER BY id DESC {$pagination['sql_page_limit']}" );

if (empty($posts)) {
	header('Location: ' . HOST . 'blog');
	exit();	
} 

$category = R::findOne('categories', 'id = ?', [$uriGetCat]);

$pageTitle = 'Блог - ' . $category->title . ' | ' . $settings['site_title'];


// Центральный шаблон для модуля
include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/blog/all.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>