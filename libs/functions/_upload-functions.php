<?php  

function saveUploadedImg ($img_func, $inputFileName, $minSize, $maxFileSizeMb, $folderName, $fullSize, $smallSize) {
	$fileName = $_FILES[$inputFileName]['name'];
	$fileTmpLoc = $_FILES[$inputFileName]['tmp_name'];
	$fileType = $_FILES[$inputFileName]['type'];
	$fileSize = $_FILES[$inputFileName]['size'];
	$fileErrorMsg = $_FILES[$inputFileName]['error'];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);

	list($width, $height) = getimagesize($fileTmpLoc);
	
	if ( $width < $minSize[0] || $height <  $minSize[1] ) {
		$_SESSION['errors'][] = ['title' => 'Изображение слишком маленького размера.', 'desc' => 'Загрузите изображение побольше'];
	}

	if ( $fileSize > ($maxFileSizeMb * 1024 * 1024) ) {
		$_SESSION['errors'][] = ['title' => 'Слишком большой файл.', 'desc' => 'Файл изображения не должен быть больше 4 мб'];
	}

	if ( !preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName) ) {
		$_SESSION['errors'][] = ['title' => 'Неверный формат файла', 'desc' => 'Файл изображения должен быть в формате gif, jpg, jpeg или png'];
	}

	if ( $fileErrorMsg == 1 ) {
		$_SESSION['errors'][] = ['title' => 'Ошибка при загрузке изображения'];
	}

	if ( empty($_SESSION['errors']) ) {
		$imgFolderLocation = ROOT . 'usercontent/' . $folderName . '/';

		$db_file_name = rand(1000000000, 9999999999) . "." . $fileExt;

		$uploadFileFullSize = $imgFolderLocation . $db_file_name;
		$uploadFileSmallSize = $imgFolderLocation . 'small-' . $db_file_name;

		$resultFullSize = $img_func($fileTmpLoc, $uploadFileFullSize, $fullSize[0], $fullSize[1]);
		$resultSmallSize = $img_func($fileTmpLoc, $uploadFileSmallSize, $smallSize[0], $smallSize[1]);

		if ( ($resultFullSize != true) || ($resultSmallSize != true) ) {
			$_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
			return false;
		}

		return [$db_file_name, 'small-' . $db_file_name];
	} else {
		return false;
	}
}

function saveUploadedFile ($inputFileName, $maxFileSizeMb, $folderName) {
	$fileName = $_FILES[$inputFileName]['name'];
	$fileTmpLoc = $_FILES[$inputFileName]['tmp_name'];
	$fileType = $_FILES[$inputFileName]['type'];
	$fileSize = $_FILES[$inputFileName]['size'];
	$fileErrorMsg = $_FILES[$inputFileName]['error'];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);

	if ( $fileSize > ($maxFileSizeMb * 1024 * 1024) ) {
		$_SESSION['errors'][] = ['title' => 'Слишком большой файл.', 'desc' => 'Файл не должен быть больше ' . $maxFileSizeMb . ' мб'];
	}

	if ( !preg_match("/\.(zip|rar|pdf|doc|docx|xls|xlsx|jpg|jpeg|gif|png)$/i", $fileName) ) {
		$_SESSION['errors'][] = ['title' => 'Недопустимый формат файла', 'desc' => 'Файл должен быть в формате zip, rar, pdf, doc, docx, xls, xlsx, jpg, jpeg, gif, png или png'];
	}

	if ( $fileErrorMsg == 1 ) {
		$_SESSION['errors'][] = ['title' => 'Ошибка загрузки файла'];
	}

	if ( empty($_SESSION['errors']) ) {
		$fileFolderLocation = ROOT . 'usercontent/' . $folderName . '/';

		$db_file_name = rand(1000000000, 9999999999) . "." . $fileExt;

		$newFilePath = $fileFolderLocation . $db_file_name;

		if ( move_uploaded_file($fileTmpLoc, $newFilePath) != true ) {
			$_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
			return false;		
		}

		return [$db_file_name, $fileName];
	}
}

?>