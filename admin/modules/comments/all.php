<?php 	

$pageTitle = 'Комментарии | Администрирование';

$pagination = pagination('comments', 10, 1);

$sqlQuery = "SELECT comments.id, comments.text, comments.timestamp, 
			comments.post, comments.user, comments.status, 
			posts.title AS post_title, 
			users.name AS user_name, users.surname AS user_surname, users.email AS user_email 
			FROM `comments` 
			LEFT JOIN `posts` ON comments.post = posts.id 
			LEFT JOIN `users` ON comments.user = users.id 
			ORDER BY comments.id DESC {$pagination['sql_page_limit']}";

$comments = R::getAll($sqlQuery);

if ( isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) ) {
	$comment = R::load('comments', $_GET['id']);
	$result = R::trash($comment);
	if ( $result ) {
		$_SESSION['success'][] = ['title' => "Сообщение успешно удалено"];
		header('Location: ' . HOST . 'admin/comments');
		exit();
	} else {
		$_SESSION['errors'][] = ['title' => "Ошибка удаления сообщения"];
	}
}

if ( isset($_GET['action']) && $_GET['action'] == 'publish' && isset($_GET['id']) ) {
	$comment = R::load('comments', $_GET['id']);
	$comment['status'] = ''; //NULL
	$result = R::store($comment);
	
	$commentsNewCounter = R::count( 'comments', ' status = ?', ['new']);

	if ( $result ) {
		$_SESSION['success'][] = ['title' => "Комментарий опубликован"];
		header('Location: ' . HOST . 'admin/comments');
		exit();
	} else {
		$_SESSION['errors'][] = ['title' => "Ошибка публикации комментария"];
	}
}

ob_start();
include ROOT . "admin/templates/comments/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>