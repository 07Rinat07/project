<?php 	

$pageTitle = 'Удалить проект | Администрирование';

if ( isset($_GET['id']) ) {
	$project = R::load('projects', $_GET['id']);

	if ($project['id'] === 0) {
		header('Location: ' . HOST . 'admin/portfolio');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {

		$coverFolderLocation = ROOT . 'usercontent/portfolio/';

		if ( isset($project->cover) && !empty($project->cover) && file_exists($coverFolderLocation . $project->cover) ) {
			unlink($coverFolderLocation . $project->cover);
		}

		if ( isset($project->cover_small) && !empty($project->cover_small) && file_exists($coverFolderLocation . $project->cover_small) ) {
			unlink($coverFolderLocation . $project->cover_small);
		}
		
		$result = R::trash( $project );

		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Проект успешно удален"];
			header('Location: ' . HOST . 'admin/portfolio');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления проекта"];
		}
	}						
}

ob_start();
include ROOT . "admin/templates/portfolio/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>