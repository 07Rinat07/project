<?php 	

$pageTitle = 'Просмотр сообщения | Администрирование';

$message = R::load('messages', $_GET['id']);

if (empty($message)) {
	header('Location: ' . HOST . 'messages');
	exit();	
} 

$message->status = NULL;
R::store($message);
$messagesNewCounter = R::count( 'messages', ' status = ?', ['new']);

ob_start();
include ROOT . "admin/templates/messages/message.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>