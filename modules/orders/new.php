<?php 	

$pageTitle = 'Оформление заказа | ' . $settings['site_title'];

if ( !empty($cart) ) {
	$products = R::findLike('products', [ 'id' => array_keys($cart) ], ' ORDER BY id ASC ');
} else {
	$products = array();
}

$cartTotalPrice = 0;

foreach ($cart as $index => $quantity) {
	$cartTotalPrice += $products[$index]['price'] * $quantity;
}

if ( isset($_POST['submit']) ) {
	
	$_POST = array_map('trim', $_POST);

	if ( $_POST['name'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите имя"];	
	}

	if ( $_POST['surname'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите фамилию"];	
	}

	if ( $_POST['email'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите e-mail"];	
	} else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		$_SESSION['errors'][] = ['title' => "Введите корректиный e-mail"];
	}	

	if ( $_POST['phone'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите телефон"];	
	}

	if ( $_POST['adress'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите адрес доставки"];	
	}


	if ( empty($_SESSION['errors']) ) {
		$order = R::dispense('orders');
		$order->name = $_POST['name'];
		$order->surname = $_POST['surname'];		
		$order->email = $_POST['email'];	
		$order->phone = $_POST['phone'];	
		$order->adress = $_POST['adress'];	
		$order->time = time();	
		$order->cart = json_encode($cart);	

		if ( isLoggedIn() ) {
			$order->user = $_SESSION['logged_user']; 
		}

		$order->status = 'new';	
		R::store($order);

		if ( isLoggedIn() ) {
			$_SESSION['cart'] = array();
			$_SESSION['logged_user']->cart = null;			
			R::store($_SESSION['logged_user']);					
		} else {
			setcookie('cart', json_encode($cart), time() - 3600 );
		}

 		header('Location: ' . HOST . 'order-created');
 		exit();
	}
}

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/orders/new.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>