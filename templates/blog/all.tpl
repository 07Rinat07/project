<main class="page-blog">
	<div class="container">
		<div class="page-blog__header">
			<h2 class="heading">
				Блог<?php echo isset($category->title) ? '. Категория "' . $category->title . '"' : null?>
			</h2>
		</div>
		<div class="page-blog__posts">
			<?php foreach ($posts as $post) : ?>	
			<div class="card-post">
				<div class="card-post__img">
					<a href="<?=HOST?>blog/<?=$post->id?>">
						<img src="<?=HOST?>usercontent/blog/<?php echo !empty($post->cover_small) ? $post->cover_small : '_no-image.jpg'?>" alt="<?=$post->title?>" />
					</a>
				</div>
				<h4 class="card-post__title">
					<a href="<?=HOST?>blog/<?=$post->id?>"><?=$post->title?></a>
				</h4>
			</div>
			<? endforeach; ?>
		</div> 
		<div class="page-blog__pagination">
			<?php include ROOT . "templates/_parts/_pagination.tpl" ?>
		</div>
	</div>
</main>