<?php 

$cart = array();

if ( isLoggedIn() && isset($_SESSION['cart']) ) {
	$cart = $_SESSION['cart'];
} elseif ( isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) ) {
	$cart = json_decode($_COOKIE['cart'], true);
}

$cartCount = array_sum($cart);

?>