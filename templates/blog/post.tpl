<?php if ( $post['id'] === 0 ): ?>

	<main class="page-post">
		<section class="page-post__post">
			<div class="section-posts">
				<div class="section-posts__title">
					<h1 class="heading mb-25">Нет такого поста</h1>
					<a href="<?=HOST?>blog">Вернуться на страницу со всеми записями блога</a>
				</div>
			</div>
		</section>
	</main>

<?php else : ?>

	<main class="page-post">
		<section class="page-post__post">
			<div class="section-posts">
				<div class="section-posts__title">
					<h1 class="heading"><?=$post['title']?></h1>
				</div>
				<div class="section-posts__info">
					<span><?=rus_date('j F Y', $post['timestamp'])?></span>
					<?php if ( isset($post['cat_title']) && !empty($post['cat_title']) ): ?>
						<div class="badge">
							<a href="<?php echo HOST . 'blog/cat/' . $post['category']; ?>">
								<?=$post['cat_title']?>
							</a>	
						</div>		
					<?php endif ?>
				</div>
				<?php if ( !empty($post['cover']) ): ?>
				<div class="section-posts__img">
					<img src="<?=HOST?>usercontent/blog/<?=$post['cover']?>" alt="<?=$post['title']?>" />
				</div>
				<?php endif ?>
				<div class="section-posts__content">
					<p><?=$post['content']?></p>
				</div>
			</div>
			<?php include ROOT . 'templates/blog/_parts/_nav.tpl' ?>
		</section>

		<?php include ROOT . 'templates/blog/_parts/_comments.tpl' ?>
		<?php include ROOT . 'templates/blog/_parts/_comments-form.tpl' ?>
		<?php include ROOT . 'templates/blog/_parts/_related.tpl' ?>
		
	</main>

<?php endif; ?>