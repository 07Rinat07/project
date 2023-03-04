<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";

$_POST = array_map('trim', $_POST);
$_POST = array_map('htmlentities', $_POST);

// Если форма отправлена - то делаем регистрацию
// Проверка на зaполненность
// Проверка на занятый email

if ( isset($_POST['register']) ) {
	if ( $_POST['email'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите email"];	
	} else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		$_SESSION['errors'][] = ['title' => "Введите корректиный email"];	
	} else if ( R::count('users', 'email = ?', array($_POST['email'])) > 0 ) {
		$_SESSION['errors'][] = ['title' => "Пользователь с указанным e-mail уже существует", 'desc' => '<p>Используйте другой адрес или воспользуйтесь <a href="' . HOST. 'lost-password">восстановлением пароля</a></p>'];
	}

	if ( $_POST['password'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите пароль"];
	} else if ( mb_strlen($_POST['password']) < 5 ) {
		$_SESSION['errors'][] = ['title' => "Слишком короткий пароль", 'desc' => "<p>Длина пароля должна быть не менее 5 символов</p>"];
	}

	// Если нет ошибок - Регистрируем пользователя
	if ( empty($_SESSION['errors']) ) {
		$user = R::dispense('users');
		$user->email = $_POST['email'];
		$user->role = 'user';
		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);	
		$result = R::store($user);
		if ( is_int($result) ) {

			// Автологин пользователя после регистрации
			$_SESSION['logged_user'] = $user;
			$_SESSION['login'] = 1;
			$_SESSION['role'] = $user->role;
			$_SESSION['success'][] = ['title' => "Вы успешно зарегистрированы.", 'desc' => "<p>Пожалуйста, заполните свой профиль.</p>" ];
			header('Location: ' . HOST . "profile-edit");
			exit();
		} else {
			$_SESSION['errors'][] = ['title' => "Ошибка записи в базу данных"];
		}
	}
}

ob_start();
include ROOT . 'templates/login/form-registration.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>

