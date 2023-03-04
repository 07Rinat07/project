<?php 	

$pageTitle = 'Добавить проект | Администрирование';

if ( isset($_POST['submit']) ) {
	$_POST = array_map('trim', $_POST);

	if ( $_POST['title'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите нвазвание"];
	}

	if ( $_POST['about'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите описание"];
	}

	if ( empty($_SESSION['errors']) ) {
		$project = R::dispense('projects');
		$project->title = $_POST['title'];
		$project->about = $_POST['about'];
		$project->technologies = $_POST['technologies'];
		$project->link = $_POST['link'];		
		$project->tags = $_POST['tags'];
		$project->timestamp = time();
	}

	if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '' ) {
		$coverFileName = saveUploadedImg('resize_and_crop_portfolio', 'cover', [1110, 935], 4, 'portfolio', [1110, 935], [500, 240]);
		
		if ( $coverFileName !== false ) {
			$project->cover = $coverFileName[0];
			$project->coverSmall = $coverFileName[1];
		}
	}

	if ( empty($_SESSION['errors']) ) {	

		R::store($project);
		$_SESSION['success'][] = ['title' => "Проект успешно добавлен"];
		header('Location: ' . HOST . 'admin/portfolio');
		exit();
	}
}

ob_start();
include ROOT . "admin/templates/portfolio/new.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>