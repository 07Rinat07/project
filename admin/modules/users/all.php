<?php 	

$pageTitle = 'Пользователи | Администрирование';

$users = R::find('users', "ORDER BY id DESC");

ob_start();
include ROOT . "admin/templates/users/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>