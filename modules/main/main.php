<?php 

$pageTitle = $settings['site_title'] . ' - ' . $settings['site_slogan'];
$pageClass = "main-page";

// Выводим 3 поста для главной
$posts = R::find('posts', "ORDER BY timestamp DESC LIMIT 0, 3");

$projects = R::find('projects', "ORDER BY timestamp DESC LIMIT 0, 2");

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/main/main.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>