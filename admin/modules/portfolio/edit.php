<?php 	

$pageTitle = 'Редактировать проект | Администрирование';

if ( isset($_GET['id']) ) {
	$project = R::load('projects', $_GET['id']);

	if ($project['id'] === 0) {
		header('Location: ' . HOST . 'admin/portfolio');
		exit();
	}

	if ( isset($_POST['edit']) ) {
		$_POST = array_map('trim', $_POST);

		if ( $_POST['title'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите нвазвание"];
		}

		if ( $_POST['about'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите описание"];
		}

		if ( empty($_SESSION['errors']) ) {
			$project->title = $_POST['title'];
			$project->about = $_POST['about'];
			$project->technologies = $_POST['technologies'];
			$project->link = $_POST['link'];
			$project->tags = $_POST['tags'];			
			$project->edit_timestamp = time();
		}
		
		if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] === 'on' ) {

			$coverFullUrl = ROOT . 'usercontent/portfolio/' . $project->cover;
			$coverSmallUrl = ROOT . 'usercontent/portfolio/' . $project->coverSmall;

			if (file_exists($coverFullUrl)) unlink($coverFullUrl);
			if (file_exists($coverSmallUrl)) unlink($coverSmallUrl);	

			$project->cover = null;
			$project->coverSmall = null;

		} else {

			if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '' ) {
			$coverFileName = saveUploadedImg('resize_and_crop_portfolio', 'cover', [1110, 935], 4, 'portfolio', [1110, 935], [500, 240]);
				
				if ( $coverFileName !== false ) {

					if ( !empty($project->cover) ) {
						$coverFullUrl = ROOT . 'usercontent/portfolio/' . $project->cover;
						$coverSmallUrl = ROOT . 'usercontent/portfolio/' . $project->coverSmall;

						if (file_exists($coverFullUrl)) unlink($coverFullUrl);
						if (file_exists($coverSmallUrl)) unlink($coverSmallUrl);	
					}

					$project->cover = $coverFileName[0];
					$project->coverSmall = $coverFileName[1];
				}
			}
			
		}

		if ( empty($_SESSION['errors']) ) {
			R::store($project);
			$_SESSION['success'][] = ['title' => "Проект успешно отредактирован"];
			header('Location:' . HOST . 'admin/portfolio');
			exit();
		}
	}
}

ob_start();
include ROOT . "admin/templates/portfolio/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>