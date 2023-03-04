<?php 	

$pageTitle = 'Удалить заказ | Администрирование';

if ( isset($_GET['id']) ) {
	$order = R::load('orders', $_GET['id']);

	if ($order['id'] === 0) {
		header('Location: ' . HOST . 'admin/orders');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {
		$result = R::trash( $order );
		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Заказ успешно удален"];
			header('Location: ' . HOST . 'admin/orders');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления заказа"];
		}
	}						
}

ob_start();
include ROOT . "admin/templates/orders/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>