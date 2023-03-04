<?php 

$pageTitle = 'Профиль пользователя | ' . $settings['site_title'];

function getUserComments( $user_id ){
	$sqlQueryComments = 'SELECT 
						comments.text, comments.post, comments.user, 
						comments.timestamp, comments.status,
						posts.title
						FROM `comments` 
						LEFT JOIN `posts` ON comments.post = posts.id 
						WHERE comments.user = ? ORDER BY comments.id DESC';
	return R::getAll($sqlQueryComments, [ $user_id ]);
}

if ( isset($uriGet) ) {
	$user = R::load('users', $uriGet);
	$comments = getUserComments($uriGet);
} elseif ( isset($_SESSION['login']) && $_SESSION['login'] === 1 ) {
	$user = R::load('users',  $_SESSION['logged_user']['id']);
	$comments = getUserComments($_SESSION['logged_user']['id']);
} else {
	$userNotLoggedIn = true;
}

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>