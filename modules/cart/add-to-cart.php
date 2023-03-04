<?php 

if ( isLoggedIn() ) {
	$user = R::load('users', $_SESSION['logged_user']['id']);

	$cart = json_decode($user->cart, true);

	if (isset($cart[$_GET['id']])) {
		$cart[$_GET['id']] += 1;
	} else {
		$cart[$_GET['id']] = 1;
	}

	$user->cart = json_encode($cart);
	R::store($user);

	$_SESSION['cart'] = $cart;	
	$_SESSION['success'][] = ['title' => 'Товар успешно добавлен в корзину'];	

} else {

	if ( isset($_COOKIE['cart']) ) {
		$cart = json_decode($_COOKIE['cart'], true);
	} else {
		$cart = array();
	}

	if (isset($cart[$_GET['id']])) {
		$cart[$_GET['id']] += 1;
	} else {
		$cart[$_GET['id']] = 1;
	}

	setcookie('cart', json_encode($cart), time() + 60 * 60 * 24 * 30 );
	$_SESSION['success'][] = ['title' => 'Товар успешно добавлен в корзину'];	
}

header('Location: ' . HOST . 'shop/' . $_GET['id']);
exit();

?>