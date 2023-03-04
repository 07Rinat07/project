<?php 	

$pageTitle = 'Удалить товар | Администрирование';

if ( isset($_GET['id']) ) {
	$product = R::load('products', $_GET['id']);

	if ($product['id'] === 0) {
		header('Location: ' . HOST . 'admin/shop');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {

		if ( !empty($product->image) ) {
			$imageFolderLocation = ROOT . 'usercontent/shop/';
			unlink($imageFolderLocation . $product->image);
			unlink($imageFolderLocation . $product->imageSmall);
		}
		
		$result = R::trash( $product );

		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Товар успешно удален"];
			header('Location: ' . HOST . 'admin/shop');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления товара"];
		}
	}						
}

ob_start();
include ROOT . "admin/templates/shop/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>