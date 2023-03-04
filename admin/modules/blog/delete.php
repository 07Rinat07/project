<?php 	

$pageTitle = 'Удалить пост | Администрирование';

if ( isset($_GET['id']) ) {
	$post = R::load('posts', $_GET['id']);

	if ($post['id'] === 0) {
		header('Location: ' . HOST . 'admin/blog');
		exit();
	}
	
	if ( isset($_POST['delete']) ) {
		// Удаление обложки
		if ( !empty($post->cover) ) {
			$coverFolderLocation = ROOT . 'usercontent/blog/';
			unlink($coverFolderLocation . $post->cover);
			unlink($coverFolderLocation . $post->coverSmall);
		}
		
		$result = R::trash( $post );

		if ( $result ) {
			$_SESSION['success'][] = ['title' => "Пост успешно удален"];
			header('Location: ' . HOST . 'admin/blog');
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка удаления поста"];
		}
	}						
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/delete.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>