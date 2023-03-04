<?php 	

$project = R::load('projects', $uriGet);

$pageTitle = $project['title'] . ' | ' . $settings['site_title'];

if ( $project['id'] === 0 ) {
	header('Location: ' . HOST . 'portfolio');
	exit();	
} 

$projects_id = R::getCol('SELECT id FROM projects');

foreach ($projects_id as $index => $value) {
	if ( $project['id'] == $value ) {
		$next_id = array_key_exists($index + 1, $projects_id) ? $projects_id[$index + 1] : null; 
		$prev_id = array_key_exists($index - 1, $projects_id) ? $projects_id[$index - 1] : null;
	}
}

$relatedProjects = getRelatedContent($project['id'], $project['title'], 'projects', ['id', 'title', 'cover_small'], 2);

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";

include ROOT . "templates/portfolio/project.tpl";

include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>