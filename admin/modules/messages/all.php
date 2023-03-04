<?php 	

$pageTitle = 'Сообщения | Администрирование';

$pagination = pagination('messages', 10, 1);

$messages = R::find('messages', "ORDER BY id DESC {$pagination['sql_page_limit']}");
// Проверка запроса на удаление
if ( isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
	
	$message = R::load('messages', $_GET['id']);
	// Удаление файла
	if ( !empty($message->file_name_src) ) {
		$coverFolderLocation = ROOT . 'usercontent/contact-form/';
		unlink($coverFolderLocation . $message->file_name_src);
	}
	
	$result = R::trash( $message );

	if ( $result ) {
		$_SESSION['success'][] = ['title' => "Сообщение успешно удалено"];
		header('Location: ' . HOST . 'admin/messages');
		exit();
	} else {
		$_SESSION['errors'][] = ['title' => "Ошибка удаления сообщения"];
	}
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/messages/all.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>