<?php if ( isset($relatedProjects) && !empty($relatedProjects) ): ?>
	<section class="page-post__see-also">
		<div class="container">
			<div class="page-post__title">
				<h2 class="heading">Смотрите также </h2>
			</div>
			<div class="row">
				<?php foreach ($relatedProjects as $relatedProject): ?>
					<div class="col-6">
						<div class="card-project">
							<div class="card-project__img-wrapper"><a href="<?=HOST?>portfolio/<?=$relatedProject['id']?>"><img src="<?=HOST?>usercontent/portfolio/<?=$relatedProject['cover_small']?>" alt="<?=$relatedProject['title']?>" />
									<div class="card-project__technology"><?//=$relatedProject['tags']?></div>
								</a></div>
							<h4 class="card-project__title"><a href="<?=HOST?>portfolio/<?=$relatedProject['id']?>"><?=$relatedProject['title']?></a></h4>
						</div>
					</div>
				<?php endforeach ?>
			</div>		
		</div>
	</section>
<?php endif ?>
