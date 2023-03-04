<?php

$pageTitle = "Восстановление пароля";
$pageClass = "authorization-page";

$_POST = array_map('trim', $_POST);
$_POST = array_map('htmlentities', $_POST);

// 1. Проверить отправку формы POST
if ( isset($_POST['lost-password']) ) {

	// 2. Проверка на заполненный email // info@mail.com
	if ( trim($_POST['email']) == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите e-mail"];	
	} else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		$_SESSION['errors'][] = ['title' => "Введите корректный e-mail"];	
	}

	if ( empty($_SESSION['errors']) ) {

			// 3. Проверка существующего email
		$user = R::findOne('users', 'email = ?', array($_POST['email']));
		if ( $user ) {
			// 4. Сгенерировать секретный код для сброса пароля
			// Генерируем секретный код
			function random_str($num = 30){
				return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $num);
			}
			
			$recovery_code = random_str();
			echo $recovery_code;

			// 5. Запомнить секретный код. Записать его в БД.
			$user->recovery_code = $recovery_code;
			R::store($user);

			// 6. Пересылаем пользователю специальную ссылку с секретным кодом для установки нового пароля
			$recovery_message = "<p>Код сброса пароля: <b>$recovery_code</b></p>";
			$recovery_message .= "<p>Для сброса пароля перейдите по ссылке ниже и установите новый пароль:</p>";	

			$recovery_link = HOST . "set-new-password?email={$_POST['email']}&code={$recovery_code}";

			$recovery_message .= '<p><a href="' . $recovery_link . '">Установить новый пароль</a></p>';	

			$headers = "MIME-Version: 1.0" . PHP_EOL .
				   	"Content-Type: text/html; charset=utf-8". PHP_EOL .
					"From: " . "=?utf-8?B?" . base64_encode(SITE_NAME) . "?=" . "<" . SITE_EMAIL . ">" . PHP_EOL .
					"Reply-To: " . SITE_EMAIL . PHP_EOL
					;

			$mailresult = mail($_POST['email'], 'Восстановление пароля', $recovery_message, $headers);

			if ( $mailresult ) {
				$_SESSION['success'][] = ['title' => "Проверьте почту", 'desc' => "<p>Вам было отправлено письмо со ссылкой для сброса пароля.</p>"];	
			} else {
				$_SESSION['errors'][] = ['title' => "Ошибка отправки формы"];	
			}

		} else {
			$_SESSION['errors'][] = ['title' => "Пользователь с указанным e-mail не найден"];
		}
	} 
}

ob_start();
include ROOT . 'templates/login/lost-password.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>
