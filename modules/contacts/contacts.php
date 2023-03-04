<?php

$pageTitle = 'Контакты | ' . $settings['site_title'];

if ( isset($_POST['submit']) ) {

	$_POST = array_map('trim', $_POST);
	$_POST = array_map('htmlentities', $_POST);

	if ( $_POST['name'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите имя"];	
	}

	if ( $_POST['email'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите email"];	
	} else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
		$_SESSION['errors'][] = ['title' => "Введите корректиный email"];
	}	

	if ( $_POST['text'] == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите текст сообщения"];	
	}

	if ( isset($_FILES['file']['name']) && $_FILES['file']['tmp_name'] !== '' ) {
		$file = saveUploadedFile('file', 4, 'contact-form');

		if ( empty($file) ) {
			$_SESSION['errors'][] = ['title' => "Ошибка загрузки файла"];	
		}
	}

	if ( empty($_SESSION['errors']) ) {
		$message = R::dispense('messages');
		$message->name = $_POST['name'];
		$message->email = $_POST['email'];	
		$message->text = $_POST['text'];	
		$message->time = time();	
		$message->status = 'new';
//		$message->fileNameSrc = $file[0];
//		$message->fileNameOriginal = $file[1];
		R::store($message);
 		$_SESSION['success'][] = ['title' => 'Сообщение успешно отправлено'];
 		header('Location: ' . HOST . 'contacts#contactForm');
 		exit();
	}
}

$settings_contacts  = R::find( 'settings', 'section LIKE ? ', [ 'contacts' ] );

$contacts = [];

foreach ($settings_contacts as $key => $value) {
	$contacts[$value['name']] = $value['value'];
}

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/contacts/contacts.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>