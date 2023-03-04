<?php 	 

require "./../../config.php";

$funcNum = $_GET['CKEditorFuncNum'];

require "./image-upload.php";

echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

?>