<?php 	

$pageTitle = 'Карьера | Администрирование';

$experience = R::find('experience', "ORDER BY id DESC");

ob_start();
include ROOT . "admin/templates/experience/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>