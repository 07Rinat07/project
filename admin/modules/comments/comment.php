<?php 	

$pageTitle = 'Просмотр комментария | Администрирование';

$sqlQuery = "SELECT comments.id, comments.text, comments.timestamp, 
			comments.post, comments.user,  comments.status,  
			posts.title AS post_title, 
			users.name AS user_name, users.surname AS user_surname, users.email AS user_email 
			FROM `comments` 
			LEFT JOIN `posts` ON comments.post = posts.id 
			LEFT JOIN `users` ON comments.user = users.id 
			WHERE comments.id = ? 
			LIMIT 1";

$comment = R::getRow($sqlQuery, [$_GET['id']]);
		
if (empty($comment)) {
	header('Location: ' . HOST . 'admin/comments');
	exit();	
} 

ob_start();
include ROOT . "admin/templates/comments/comment.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>