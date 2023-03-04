<?php 	

$pageTitle = 'Просмотр заказа | Администрирование';

$order = R::load('orders', $_GET['id']);

if ( empty($order) ) {
	header('Location: ' . HOST . 'orders');
	exit();	
} 

$cart = json_decode($order['cart'], true);

if ( !empty($cart) ) {
	$products = R::findLike('products', [ 'id' => array_keys($cart) ], ' ORDER BY id ASC ');
} else {
	$products = array();
}

$cartCount = 0;
$cartTotalPrice = 0;

foreach ($cart as $index => $quantity) {
	$cartCount += $quantity;
	$cartTotalPrice += $products[$index]['price'] * $quantity;
}

ob_start();
include ROOT . "admin/templates/orders/order.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>