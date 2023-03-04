<section class="page-post__see-also">
	<div class="container">
		<div class="page-post__title">
			<h2 class="heading">Смотрите также </h2>
		</div>
		<div class="row">
			<?php foreach ($relatedPosts as $relatedPost): ?>
				<div class="col-4">
					<div class="card-post">
						<div class="card-post__img">
							<a href="<?=HOST?>blog/<?=$relatedPost['id']?>">
								<img src="<?=HOST?>usercontent/blog/<?=$relatedPost['cover_small']?>" alt="<?= $relatedPost['title'] ?>" />
							</a>
						</div>
						<h4 class="card-post__title">
							<a href="#"> 
								<?= $relatedPost['title'] ?>
							</a>
						</h4>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>