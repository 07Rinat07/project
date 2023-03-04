<?php 	

$pagination = pagination('projects', 6, 1, [ 'tags LIKE ?', ['%' . $_GET['tag'] . '%'] ]);

$projects = R::find( 'projects', ' tags LIKE ? ', [ '%' . $_GET['tag'] . '%' ], "ORDER BY id DESC {$pagination['sql_page_limit']}");

$pageTitle = 'Портфолио - ' . $_GET['tag'] . ' | ' . $settings['site_title'];

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/all.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>