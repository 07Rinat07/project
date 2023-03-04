<?php 

if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']) ) {
	
	if ( $_SESSION['logged_user']['role'] == 'admin' ) {
		$sqlQueryComments = 'SELECT comments.text, comments.user, comments.timestamp, comments.status,
							users.name, users.surname, users.avatar_small	
							FROM `comments` 
							LEFT JOIN `users` ON comments.user = users.id 
							WHERE comments.post = ? 
							ORDER BY comments.id DESC';

		$comments = R::getAll($sqlQueryComments, [ $post['id'] ] );
	}

	if ( $_SESSION['logged_user']['role'] == 'user' ) {
		$sqlQueryComments = 'SELECT comments.text, comments.user, comments.timestamp, comments.status,
							users.name, users.surname, users.avatar_small	
							FROM `comments` 
							LEFT JOIN `users` ON comments.user = users.id 
							WHERE comments.post = ? AND (comments.user = ? OR comments.status <> ?) 
							ORDER BY comments.id DESC';

		$comments = R::getAll($sqlQueryComments, [ $post['id'], $_SESSION['logged_user']['id'], 'new'] );
	}

} else {
	
	$sqlQueryComments = 'SELECT comments.text, comments.user, comments.timestamp, comments.status,
						users.name, users.surname, users.avatar_small	
						FROM `comments` 
						LEFT JOIN `users` ON comments.user = users.id 
						WHERE comments.post = ? AND comments.status <> ?  
						ORDER BY comments.id DESC';

	$comments = R::getAll($sqlQueryComments, [ $post['id'], 'new'] );	
}

?>