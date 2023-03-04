<?php 	

$pageTitle = 'Удалить пользователя | Администрирование';

if ( isset($_GET['id']) ) {
	$user = R::load('users', $_GET['id']);

	if ($user['id'] === 0) {
		header('Location: ' . HOST . 'admin/users');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {
		$result = R::trash( $user );
		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Пользователь успешно удален"];
			header('Location: ' . HOST . 'admin/users');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления пользователя"];
		}
	}						
}

ob_start();
include ROOT . "admin/templates/users/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>