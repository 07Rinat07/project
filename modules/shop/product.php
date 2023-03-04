<?php 	

$product = R::load('products', $uriGet);

$pageTitle = $product['title'] . ' | ' . $settings['site_title'];

if (empty($product)) {
	header('Location: ' . HOST . 'shop');
	exit();	
} 

$relatedProducts = getRelatedContent($product['id'], $product['title'], 'products', ['id', 'title', 'price', 'image_small']);

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/shop/product.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>