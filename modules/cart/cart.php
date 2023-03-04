<?php 	

$pageTitle = "Корзина";

if ( !empty($cart) ) {
	$products = R::findLike('products', [ 'id' => array_keys($cart) ], ' ORDER BY id ASC ');
} else {
	$products = array();
}

$cartTotalPrice = 0;

if ( isset( $cart ) ) {
	foreach ($cart as $index => $quantity) {
		$cartTotalPrice += $products[$index]['price'] * $quantity;
	}
}

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/cart/cart.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>