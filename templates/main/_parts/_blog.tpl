<section class="main-page__posts-cards">
	<div class="main-page__posts-cards-title">
		<h2 class="heading">Новые записи в <a href="<?=HOST?>blog">блоге</a>
		</h2>
	</div>
	<div class="row">
		<?php foreach ($posts as $post): ?>
			<div class="col-4">
				<div class="card-post">
					<div class="card-post__img">
						<a href="<?=HOST?>blog/<?=$post->id?>">
							<img src="<?=HOST?>usercontent/blog/<?=$post->cover_small?>" alt="<?=$post->title?>" />
						</a>
					</div>
					<h4 class="card-post__title">
						<a href="<?=HOST?>blog/<?=$post->id?>">
							<?=$post->title?>
						</a>
					</h4>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</section>