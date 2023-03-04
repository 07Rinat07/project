<?php 	

$pageTitle = 'Портфолио | Администрирование';

$pagination = pagination('projects', 10, 1);

$projects = R::find('projects', "ORDER BY id DESC {$pagination['sql_page_limit']}");

ob_start();
include ROOT . "admin/templates/portfolio/all.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "admin/templates/template.tpl";

?>