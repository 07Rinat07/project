<?php 	

$pageTitle = 'Об авторе | Администрирование';

$settings_about = R::find( 'settings', 'section LIKE ? ', [ 'about' ] );

$about = [];

foreach ($settings_about as $key => $value) {
	$about[$value['name']] = $value['value'];
}

if ( isset($_POST['submit']) ) {

	$_POST = array_map('trim', $_POST);

	if ( $_POST['about_title'] == '' ) {
		$_SESSION['errors'][] = ['title' => 'Введите заголовок'];
	}

	if ( empty($_SESSION['errors']) ) {
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['about_title'], 'about', 'about_title']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['about_text'], 'about', 'about_text']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['services_title'], 'about', 'services_title']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['services_text'], 'about', 'services_text']);

		$_POST['skills_status_on'] = isset($_POST['skills_status_on']) ? $_POST['skills_status_on'] : null;
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['skills_status_on'], 'about', 'skills_status_on']);

		$_POST['experience_status_on'] = isset($_POST['experience_status_on']) ? $_POST['experience_status_on'] : null;
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST[''], 'about', '']);
		//$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['experience_status_on'], 'about', 'experience_status_on']); если то писать, временно убрал так как с БД управление

		foreach ($result as $value) {
			if ( is_array($value) && empty($value) ) {
				$_SESSION['errors'][] = ['title' => "Ошибка обновления данных"];	
				break;
			}
		} 

		if ( empty($_SESSION['errors']) ) {
			$_SESSION['success'][] = ['title' => "Страница успешно обновлена"];		
			header('Location: ' . HOST . 'admin/about');
			exit();
		} 
	}
}

ob_start();
include ROOT . "admin/templates/about/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>