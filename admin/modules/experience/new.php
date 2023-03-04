<?php 	

$pageTitle = 'Добавить место работы | Администрирование';

if ( isset($_POST['submit']) ) {
	$_POST = array_map('trim', $_POST);

	if ( $_POST['title'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите должность"];
	}

	if ( $_POST['description'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите описание"];
	}

	if ( $_POST['time_start'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите время начала работы"];
	}

	if ( $_POST['time_end'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите время окончания работы"];
	}	

	if ( empty($_SESSION['errors']) ) {
		$workplace = R::dispense('experience');
		$workplace->title = $_POST['title'];
		$workplace->description = $_POST['description'];
		$workplace->time_start = $_POST['time_start'];
		$workplace->time_end = $_POST['time_end'];

		R::store($workplace);

		$_SESSION['success'][] = ['title' => "Запись успешно добавлена"];
		header('Location: ' . HOST . 'admin/experience');
		exit();
	}
}

ob_start();
include ROOT . "admin/templates/experience/new.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>