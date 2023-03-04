<?php 	

$pageTitle = 'Редактировать пост | Администрирование';

$categories = R::find('categories', 'ORDER BY title ASC');

if ( isset($_GET['id']) ) {
	$post = R::load('posts', $_GET['id']);

	if ($post['id'] === 0) {
		header('Location: ' . HOST . 'admin/blog');
		exit();
	}

	if ( isset($_POST['edit']) ) {

		$_POST = array_map('trim', $_POST);
		// Проверка на заполненность - Заголовок
		if ( $_POST['title'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите заголовок поста"];
		}

		if ( $_POST['content'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите содержимое поста"];
		}

		if ( empty($_SESSION['errors']) ) {
			$post->title = $_POST['title'];
			$post->content = $_POST['content'];
			$post->edit_timestamp = time();
			$post->category = $_POST['category'];
		}
		// Удаление обложки
		if ( isset($_POST['delete-cover']) && $_POST['delete-cover'] === 'on' ) {
			// Удалить файлы обложки
			$coverFullUrl = ROOT . 'usercontent/blog/' . $post->cover;
			$coverSmallUrl = ROOT . 'usercontent/blog/' . $post->coverSmall;

			if (file_exists($coverFullUrl)) unlink($coverFullUrl);
			if (file_exists($coverSmallUrl)) unlink($coverSmallUrl);

			// Удалить записи в БД
			$post->cover = null;
			$post->coverSmall = null;

		} else {
			// Если передано изображение - уменьшаем, сохраняем, записываем в БД
			if ( isset($_FILES['cover']['name']) && $_FILES['cover']['tmp_name'] !== '' ) {
				// Обрабатываем картинку, сохраняем, и получаем имя файла
				$coverFileName = saveUploadedImg('resize_and_crop', 'cover', [600, 300], 4, 'blog', [1110, 460], [290, 230]);
				
				if ( $coverFileName !== false ) {

					if ( !empty($post->cover) ) {
						$coverFullUrl = ROOT . 'usercontent/blog/' . $post->cover;
						$coverSmallUrl = ROOT . 'usercontent/blog/' . $post->coverSmall;

						if (file_exists($coverFullUrl)) unlink($coverFullUrl);
						if (file_exists($coverSmallUrl)) unlink($coverSmallUrl);	
					}
					// Сохраняем имя файла в БД
					$post->cover = $coverFileName[0];
					$post->coverSmall = $coverFileName[1];
				}
			}
			
		}

		if ( empty($_SESSION['errors']) ) {
			R::store($post);
			$_SESSION['success'][] = ['title' => "Пост успешно отредактирован"];
		}
	}
}
// Центральный шаблон для модуля
ob_start();
include ROOT . "admin/templates/blog/edit.tpl";
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . "admin/templates/template.tpl";

?>