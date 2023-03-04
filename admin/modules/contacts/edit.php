<?php 	

$pageTitle = 'Контакты | Администрирование';

$settings_contacts  = R::find( 'settings', 'section LIKE ? ', [ 'contacts' ] );

$contacts = [];

foreach ($settings_contacts as $key => $value) {
	$contacts[$value['name']] = $value['value'];
}

// Если форма отправлена
if ( isset($_POST['submit']) ) {

	$_POST = array_map('trim', $_POST);

	// Проверка на заполненность - Заголовок
	if ( $_POST['contacts_title'] == '' ) {
		$_SESSION['errors'][] = ['title' => 'Введите заголовок секции "Контакты"'];
	}

// Проверка на заполненность - Содержимое
	if ( $_POST['contacts_text'] == '' ) {
		$_SESSION['errors'][] = ['title' => 'Введите текст секции "Контакты"'];
	}

	if ( empty($_SESSION['errors']) ) {
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['about_title'], 'contacts', 'about_title']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['about_text'], 'contacts', 'about_text']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['services_title'], 'contacts', 'services_title']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['services_title'], 'contacts', 'services_title']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['contacts_title'], 'contacts', 'contacts_title']);
		$result[] = R::exec('UPDATE settings SET value = ? WHERE section = ? AND name = ?', [$_POST['contacts_text'], 'contacts', 'contacts_text']);

		foreach ($result as $value) {
			if ( is_array($value) && empty($value) ) {
				$_SESSION['errors'][] = ['title' => "Ошибка обновления контактов"];	
				break;
			}
		}
		// Проверка на ошибку при сохранении и вывод нoтификации
		if ( empty($_SESSION['errors']) ) {
			$_SESSION['success'][] = ['title' => "Контакты успешно обновлены"];		
		} 
	}
}

// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/contacts/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>