<?php 	

$pageTitle = 'Администрирование';

$postsCount = R::count('posts');
$categoriesCount = R::count('categories');
$commentsCount = R::count('comments');
$projectsCount = R::count('projects');
$productsCount = R::count('products');
$ordersCount = R::count('orders');
$messagesTotalCount = R::count('messages');
$usersCount = R::count('users');

ob_start();
include ROOT . "admin/templates/main/main.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>