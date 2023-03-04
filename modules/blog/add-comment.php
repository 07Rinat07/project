<?php 

if ( isset($_SESSION['login']) && $_SESSION['login'] === 1 ) {
	if ( isset($_POST['submit']) ) {

		$_POST = array_map('trim', $_POST);

		// Проверка на ID
		if( !isset($_POST['post_id']) || empty($_POST['post_id']) ) {
			$_SESSION['errors'][] = ['title' => 'Отсутствует параметр id'];	
		}

		// Проверка на текст комментария
		if( !isset($_POST['comment']) || empty($_POST['comment']) || mb_strlen($_POST['comment']) < 3 ) {
			$_SESSION['errors'][] = ['title' => 'Слишком короткий текст комментария'];	
		}

		// Сохранние комментария
		if ( empty($_SESSION['errors']) ) {
			$comment = R::dispense('comments');	
			$comment->text = $_POST['comment'];
			$comment->post = $_POST['post_id'];
			$comment->user = $_SESSION['logged_user']['id'];		
			$comment->timestamp = time();	
			$comment->status = ($_SESSION['logged_user']['role'] !== 'admin') ? 'new' : '';
			R::store($comment);
			header('Location: ' . HOST . 'blog/' . $_POST['post_id'] . '#comments');
		} else {
			header('Location: ' . HOST . 'blog/' . $_POST['post_id'] . '#comments-form');
		}
	}
}

?>