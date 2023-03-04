<?php 	

$pageTitle = 'Добавить товар | Администрирование';

if ( isset($_POST['submit']) ) {
	
	$_POST = array_map('trim', $_POST);

	if ( $_POST['title'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите название товара"];
	}

	if ( $_POST['price'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите цену товара"];
	}

	if ( $_POST['description'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите описание товара"];
	}

	if ( empty($_SESSION['errors']) ) {
		$product = R::dispense('products');
		$product->title = $_POST['title'];
		$product->price = $_POST['price'];
		$product->description = $_POST['description'];		
		$product->timestamp = time();
	}

	if ( isset($_FILES['image']['name']) && $_FILES['image']['tmp_name'] !== '' ) {
		$imageFileName = saveUploadedImg('resize_without_crop', 'image', [540, 380], 2, 'shop', [540, 380], [290, 230]);

		if ( $imageFileName !== false ) {
			$product->image = $imageFileName[0];
			$product->imageSmall = $imageFileName[1];
		}
	}

	if ( empty($_SESSION['errors']) ) {			
		R::store($product);
		$_SESSION['success'][] = ['title' => "Товар успешно добавлен"];
		header('Location: ' . HOST . 'admin/shop');
		exit();
	}
}

ob_start();
include ROOT . "admin/templates/shop/new.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>