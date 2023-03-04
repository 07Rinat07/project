<?php 	

$pageTitle = 'Редактировать товар | Администрирование';

if ( isset($_GET['id']) ) {
	$product = R::load('products', $_GET['id']);

	if ($product['id'] === 0) {
		header('Location: ' . HOST . 'admin/shop');
		exit();
	}

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
			$product->title = $_POST['title'];
			$product->price = $_POST['price'];
			$product->description = $_POST['description'];			
			$product->edit_time = time();
		}
		
		if ( isset($_POST['delete-image']) && $_POST['delete-image'] === 'on' ) {

			$imageFullUrl = ROOT . 'usercontent/shop/' . $product->image;
			$imageSmallUrl = ROOT . 'usercontent/shop/' . $product->imageSmall;

			if (file_exists($imageFullUrl)) unlink($imageFullUrl);
			if (file_exists($imageSmallUrl)) unlink($imageSmallUrl);	

			$product->image = null;
			$product->imageSmall = null;

		} else {

			if ( isset($_FILES['image']['name']) && $_FILES['image']['tmp_name'] !== '' ) {
				$imageFileName = saveUploadedImg('resize_without_crop', 'image', [540, 380], 2, 'shop', [540, 380], [290, 230]);

				if ( $imageFileName !== false ) {

					if ( !empty($product->image) ) {
						$imageFullUrl = ROOT . 'usercontent/shop/' . $product->image;
						$imageSmallUrl = ROOT . 'usercontent/shop/' . $product->imageSmall;

						if (file_exists($imageFullUrl)) unlink($imageFullUrl);
						if (file_exists($imageSmallUrl)) unlink($imageSmallUrl);	
					}

					$product->image = $imageFileName[0];
					$product->imageSmall = $imageFileName[1];
				}
			}
		}

		if ( empty($_SESSION['errors']) ) {
			R::store($product);
			$_SESSION['success'][] = ['title' => "Товар успешно отредактирован"];
			header('Location: ' . HOST . 'admin/shop');
			exit();
		}
	}
}

ob_start();
include ROOT . "admin/templates/shop/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>