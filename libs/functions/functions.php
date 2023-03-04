<?php  

require_once ROOT . "libs/functions/_content-functions.php";
require_once ROOT . "libs/functions/_date-time-functions.php";
require_once ROOT . "libs/functions/_image-functions.php";
require_once ROOT . "libs/functions/_upload-functions.php";
require_once ROOT . "libs/functions/_uri-functions.php";

function isLoggedIn() {
	$result = isset($_SESSION['logged_user']) ? true : false;
	return $result;
}

?>