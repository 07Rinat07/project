<?php 	

$pageTitle = 'Портфолио | ' . $settings['site_title'];
$pagination = pagination('projects', 4);
$projects = R::find('projects', "ORDER BY id DESC {$pagination['sql_page_limit']}");

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>