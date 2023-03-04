<?php
// Одиночный пост
// Выводим отдельный пост
// $post = R::load('posts', $uriGet);
$sqlQuery = 'SELECT  posts.id, posts.title, posts.content, posts.cover, 
					 posts.timestamp, posts.category, categories.title AS cat_title
			FROM `posts` 
			LEFT JOIN `categories` ON posts.category = categories.id 
			WHERE posts.id = ? LIMIT 1';

$post = R::getRow($sqlQuery, [$uriGet]);

$pageTitle = $post['title'] . ' | ' . $settings['site_title'];

if (empty($post)) {
	header('Location: ' . HOST . 'blog');
	exit();	
} 

$posts_id = R::getCol('SELECT id FROM posts');

foreach ($posts_id as $index => $value) {
	if ( $post['id'] == $value ) {
		$next_id = array_key_exists($index + 1, $posts_id) ? $posts_id[$index + 1] : null; 
		$prev_id = array_key_exists($index - 1, $posts_id) ? $posts_id[$index - 1] : null;
	}
}

include ROOT . "modules/blog/comments.php";

$relatedPosts = getRelatedContent($post['id'], $post['title'], 'posts', ['id', 'title', 'cover_small']);

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/blog/post.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>