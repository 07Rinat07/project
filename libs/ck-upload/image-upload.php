<?php 

require_once ROOT . "libs/ck-upload/resize.php";

if ( isset($_FILES['upload']['name']) && $_FILES['upload']['tmp_name'] !== '' ) {
	$fileName = $_FILES['upload']['name'];
	$fileTmpLoc = $_FILES['upload']['tmp_name'];
	$fileType = $_FILES['upload']['type'];
	$fileSize = $_FILES['upload']['size'];
	$fileErrorMsg = $_FILES['upload']['error'];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);
	list($width, $height) = getimagesize($fileTmpLoc);
	
	if ( $width < 1 || $height < 1 ) {
		$message = 'Слишком маленький размер изображения';
	}

	if ( $fileSize > 4194304 ) {
		$message = 'Файл изображения не должен быть больше 4 мб';
	}

	if ( !preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName) ) {
		$message = 'Файл изображения должен быть в формате jpg, gif или png';
	}

	if ( $fileErrorMsg == 1 ) {
		$message = 'Ошибка при загрузке изображения';
	}

	if ( empty($message) ) {

		$coverFolderLocation = ROOT . 'usercontent/editor-uploads/';

		$db_file_name = rand(1000000000, 9999999999) . "." . $fileExt;

		$uploadFile = $coverFolderLocation . $db_file_name;

		if ( $width > 920 || $height > 920) {
        	$result = resize($fileTmpLoc, $uploadFile, 920);
            if ($result != true) {
                $message =  'Ошибка сохранения файла при масштабировании';
                return false;
            }
        } else {
            $result = move_uploaded_file($fileTmpLoc, $uploadFile);
            if ($result != true) {
                $message =  'Ошибка перемещения файла';
                return false;
            }
        }
	}
}

$url = "./../usercontent/editor-uploads/" . $db_file_name ;
$message = 'Файл успешно загружен';

?>