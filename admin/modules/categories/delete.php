<?php 	

$pageTitle = 'Удалить категорию | Администрирование';

if ( isset($_GET['id']) ) {
	$category = R::load('categories', $_GET['id']);

	if ($category['id'] === 0) {
		header('Location: ' . HOST . 'admin/categories');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {
		$result = R::trash( $category );
		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Категория успешно удалена"];
			header('Location: ' . HOST . 'admin/categories');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления категории"];
		}
	}						
}
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/categories/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>