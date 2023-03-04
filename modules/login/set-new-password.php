<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";

$_GET = array_map('trim', $_GET);
$_GET = array_map('htmlentities', $_GET);
$_POST = array_map('trim', $_POST);
$_POST = array_map('htmlentities', $_POST);

// 1) Пришли по секретной ссылке с EMAIl
if ( !empty($_GET['email']) && !empty($_GET['code']) ) {

	// Найти юзера по email в БД
	$user = R::findOne('users', 'email = ?', array($_GET['email']));
	
	if ( !$user ) {
		header("Location: " . HOST . "lost-password");
	}

	// 2) Если отправлена форма с новым паролем
} else if ( !empty($_POST['set-new-password']) ) {

	// Найти юзера по email в БД
	$user = R::findOne('users', 'email = ?', array($_POST['resetEmail']));

	// Если пользователь был найден
	if ( $user ) {
		// Проверить Секретный код на верность
		if ( $user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '' ) {		
			if ( $_POST['password'] == '' ) {
				$_SESSION['errors'][] = ['title' => "Введите пароль"];
			} else if ( mb_strlen($_POST['password']) < 5 ) {
				$_SESSION['errors'][] = ['title' => "Слишком короткий пароль", 'desc' => "<p>Длина пароля должна быть не менее 5 символов</p>"];
			} 
			
			if ( empty($_SESSION['errors']) ) {
				$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->recovery_code = '';
				R::store($user);

				// Сообщение об успехе и вход на сайт
				$_SESSION['success'][] = ['title' => "Пароль успешно изменен"];
				$newPasswordReady = true;
			} 
		} else {
			$_SESSION['errors'][] = ['title' => "Неверный код сброса пароля"];
		}
	}
	
}
// 3) Перенаправляем на loat-password
else {
	header("Location: " . HOST . "lost-password");
}

ob_start();
include ROOT . 'templates/login/set-new-password.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>