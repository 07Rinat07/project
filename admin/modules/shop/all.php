<?php 	

$pageTitle = 'Каталог товаров | Администрирование';
$pagination = pagination('products', 10, 1);
$products = R::find('products', "ORDER BY id DESC {$pagination['sql_page_limit']}");

ob_start();
include ROOT . "admin/templates/shop/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>