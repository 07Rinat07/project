<?php 	

$pageTitle = 'Добавить категорию | Администрирование';

if ( isset($_POST['submit']) ) {
	$_POST = array_map('trim', $_POST);

	// Проверка на заполненность - Заголовок
	if ( $_POST['name'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите название категории"];
	}

	if ( empty($_SESSION['errors']) ) {
		$categories = R::dispense('categories');
		$categories->title = $_POST['name'];
		R::store($categories);
		$_SESSION['success'][] = ['title' => "Категория успешно добавлена"];
		header('Location: ' . HOST . 'admin/categories');
		exit();
	}
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/categories/new.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>