<?php 	

$pageTitle = 'Добавить пост | Администрирование';

$categories = R::find('categories', 'ORDER BY title ASC');

if ( isset($_POST['submit']) ) {
	$_POST = array_map('trim', $_POST);

	// Проверка на заполненность - Заголовок
	if ( trim($_POST['title'] )== '' ) {
		$_SESSION['errors'][] = ['title' => "Введите заголовок поста"];
	}

	// Проверка на заполненность - Содержимое
	if (trim($_POST['content'] ) == '' ) {
		$_SESSION['errors'][] = ['title' => "Введите содержимое поста"];
	}

	if ( empty($_SESSION['errors']) ) {
		$post = R::dispense('posts');
		$post->title = $_POST['title'];
		$post->content = $_POST['content'];
		$post->timestamp = time();
		$post->category = $_POST['category'];		
	}
	// Если передано изображение - уменьшаем, сохраняем, записываем в БД
	if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '' ) {
		// Обрабатываем картинку, сохраняем, и получаем имя файла
		$coverFileName = saveUploadedImg('resize_and_crop', 'cover', [600, 300], 4, 'blog', [1110, 460], [290, 230]);
		
		if ( $coverFileName !== false ) {
			$post->cover = $coverFileName[0];
			$post->coverSmall = $coverFileName[1];
		}
	}

	if ( empty($_SESSION['errors']) ) {			
		R::store($post);
		$_SESSION['success'][] = ['title' => "Пост успешно добавлен"];
		header('Location: ' . HOST . 'admin/blog');
		exit();
	}
}
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/new.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>