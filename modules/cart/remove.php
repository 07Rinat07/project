<?php  

if ( isLoggedIn() ) {
	
	$user = R::load('users', $_SESSION['logged_user']['id']);
	$cart = json_decode($user->cart, true);

	unset($cart[$_GET['id']]);

	$user->cart = json_encode($cart);
	R::store($user);
	$_SESSION['cart'] = $cart;
	$_SESSION['success'][] = ['title' => 'Товар успешно удален из корзины'];	

}

if ( !isLoggedIn() ) {

	if ( isset($_COOKIE['cart']) ) {
		$cart = json_decode($_COOKIE['cart'], true);
	} else {
		$cart = array();
	}

	unset($cart[$_GET['id']]);

	setcookie('cart', json_encode($cart), time() + 60 * 60 * 24 * 30 );
	$_SESSION['success'][] = ['title' => 'Товар успешно удален из корзины'];	

}

header('Location: ' . HOST . 'cart');

?>