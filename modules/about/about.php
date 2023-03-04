<?php 	

$pageTitle = 'Об авторе | ' . $settings['site_title'];
$settings_about = R::find( 'settings', 'section LIKE ? ', [ 'about' ] );
$about = [];

foreach ($settings_about as $key => $value) {
	$about[$value['name']] = $value['value'];
}
$experience = R::find('experience', "ORDER BY id DESC");

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/about/about.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>