<?php 	

$pageTitle = 'Заказы | Администрирование';

$orders = R::find('orders', "ORDER BY id DESC");

if ( isset($_GET['action']) && $_GET['action'] == 'finish' && isset($_GET['id']) ) {
	$order = R::load('orders', $_GET['id']);
	$order['status'] = 'finished';
	$result = R::store($order);
	
	$ordersNewCounter = R::count( 'orders', ' status = ?', ['new']);

	if ( $result ) {
		$_SESSION['success'][] = ['title' => "Заказ успешно завершен"];
		header('Location: ' . HOST . 'admin/orders');
		exit();
	} else {
		$_SESSION['errors'][] = ['title' => "Ошибка завершения заказа"];
	}
}

ob_start();
include ROOT . "admin/templates/orders/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>