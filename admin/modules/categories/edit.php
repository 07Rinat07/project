<?php 	

$pageTitle = 'Редактировать категорию | Администрирование';

if ( isset($_GET['id']) ) {
	$category = R::load('categories', $_GET['id']);

	if ($category['id'] === 0) {
		header('Location: ' . HOST . 'admin/categories');
		exit();
	}

	if ( isset($_POST['edit']) ) {

		$_POST = array_map('trim', $_POST);

		if ( $_POST['name'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите название категории"];
		}

		if ( empty($_SESSION['errors']) ) {
			$category->title = $_POST['name'];
			R::store($category);
			$_SESSION['success'][] = ['title' => "Категория успешно отредактирована"];
			header('Location: ' . HOST . 'admin/categories');
			exit();
		}
	}
}
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/categories/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>