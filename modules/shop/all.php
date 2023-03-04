<?php 	

$pageTitle = 'Каталог товаров | ' . $settings['site_title'];

$pagination = pagination('products', 6);

$products = R::find('products', "ORDER BY id DESC {$pagination['sql_page_limit']}");

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/shop/catalog.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>