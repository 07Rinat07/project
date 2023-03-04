<?php 	

$pageTitle = 'Удалить место работы | Администрирование';

if ( isset($_GET['id']) ) {
	$workplace = R::load('experience', $_GET['id']);

	if ($workplace['id'] === 0) {
		header('Location: ' . HOST . 'admin/experience');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {
		
		$result = R::trash( $workplace );

		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Запись успешно удалена"];
			header('Location: ' . HOST . 'admin/experience');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления записи"];
		}
	}						
}

ob_start();
include ROOT . "admin/templates/experience/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>