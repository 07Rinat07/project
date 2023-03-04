<?php 

$messagesNewCounter = R::count( 'messages', ' status = ?', ['new']);
$commentsNewCounter = R::count( 'comments', ' status = ?', ['new']);
$ordersNewCounter = R::count( 'orders', ' status = ?', ['new']);

?>