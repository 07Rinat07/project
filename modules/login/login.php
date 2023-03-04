<?php

$pageTitle = "Вход на сайт";
$pageClass = "authorization-page";

$_POST = array_map('trim', $_POST);
$_POST = array_map('htmlentities', $_POST);

// 1. Проверка на отправку формы входа
if ( isset($_POST['login']) ) {

	// 2. Заполненность полей
	if ( trim($_POST['email']) == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите e-mail"];	
	} else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		$_SESSION['errors'][] = ['title' => "Введите корректный e-mail"];	
	}

	if ( trim($_POST['password']) == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите пароль"];
	}
	// Если поля заполнены, ошибок нет
	if ( empty($_SESSION['errors']) ) {
		// 3. Ищем нужного юзера в БД по email
		$user = R::findOne('users', 'email = ?', array($_POST['email']));
		if ( $user ) {
			// 4. Сравнение пароля
			if ( password_verify($_POST['password'], $user->password) ) {

				// Логин пользователя
				$_SESSION['logged_user'] = $user;
				$_SESSION['login'] = 1;
				$_SESSION['role'] = $user->role;
				$_SESSION['cart'] = json_decode($_SESSION['logged_user']['cart'], true);		

				if ( isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) ) {
					$cartTemp =  json_decode($_COOKIE['cart'], true);
					foreach ($cartTemp as $key => $value) {
						if ( isset($_SESSION['cart'][$key])   ) {
							$_SESSION['cart'][$key] += $value;
						} else {
							$_SESSION['cart'][$key] = $value;
						}
					}
					
					$user->cart = json_encode($_SESSION['cart']);
					R::store($user);

					setcookie('cart', json_encode($cart), time() - 3600 );
				}

				$_SESSION['success'][] = ['title' => "Вы успешно вошли на сайт!"];	
				header('Location: ' . HOST . "profile");
				exit();
			} else {
				$_SESSION['errors'][] = ['title' => "Неверный пароль"];
			}
		} else {
			$_SESSION['errors'][] = ['title' => "Пользователь не найден"];
		}
	} 
}

ob_start();
include ROOT . 'templates/login/form-login.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>