<?php 

$commentsNewCounter = R::count( 'comments', ' status = ?', ['new']);
$ordersNewCounter = R::count( 'orders', ' status = ?', ['new']);
$messagesNewCounter = R::count( 'messages', ' status = ?', ['new']);

?>