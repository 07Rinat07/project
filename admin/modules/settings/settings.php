<?php 	

$pageTitle = 'Настройки сайта | Администрирование';

$settings_settings  = R::find( 'settings', 'section LIKE ? ', [ 'settings' ] );

$settings = [];

foreach ($settings_settings as $key => $value) {
	$settings[$value['name']] = $value['value'];
}

// Если форма отправлена
if ( isset($_POST['submit']) ) {

	// Проверка на заполненность - Заголовок
	$_POST = array_map('trim', $_POST);
	if ( $_POST['site_title'] == '' ) {
		$_SESSION['errors'][] = ['title' => 'Введите название сайта'];
	}

	if ( $_POST['copyright_name'] == '' ) {
		$_SESSION['errors'][] = ['title' => 'Введите копирайт'];
	}

	if ( empty($_SESSION['errors']) ) {
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['site_title'], 'settings', 'site_title']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['site_slogan'], 'settings', 'site_slogan']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['copyright_name'], 'settings', 'copyright_name']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['copyright_year'], 'settings', 'copyright_year']);

		$_POST['status_on'] = isset($_POST['status_on']) ? $_POST['status_on'] : null;
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['status_on'], 'settings', 'status_on']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['status_label'], 'settings', 'status_label']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['status_text'], 'settings', 'status_text']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['status_link'], 'settings', 'status_link']);

		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['youtube'], 'settings', 'youtube']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['instagram'], 'settings', 'instagram']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['facebook'], 'settings', 'facebook']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['vkontakte'], 'settings', 'vkontakte']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['linkedin'], 'settings', 'linkedin']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['github'], 'settings', 'github']);

		foreach ($result as $value) {
			if ( is_array($value) && empty($value) ) {
				$_SESSION['errors'][] = ['title' => "Ошибка обновления настроек сайта"];	
				break;
			}
		} 

		if ( empty($_SESSION['errors']) ) {
			$_SESSION['success'][] = ['title' => "Настройки сайта успешно обновлены"];		
			header('Location: ' . HOST . 'admin/settings');
			exit();
		} 
	}
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/settings/settings.tpl";
$content = ob_get_contents();
ob_end_clean();


// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>