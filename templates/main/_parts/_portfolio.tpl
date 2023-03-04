<section class="main-page__projects-cards">
	<div class="main-page__projects-cards-title">
		<h2 class="heading">Новые проекты в <a href="<?=HOST?>portfolio">портфолио</a>
		</h2>
	</div>
	<div class="row">
		<?php foreach ($projects as $project): ?>
			<div class="col-6">
				<div class="card-project">
					<div class="card-project__img-wrapper"><a href="<?=HOST?>portfolio/<?=$project['id']?>"><img src="<?=HOST?>usercontent/portfolio/<?=$project['cover_small']?>" alt="<?=$project['title']?>" />
							<div class="card-project__technology"><?=$project['tags']?></div>
						</a></div>
					<h4 class="card-project__title"><a href="<?=HOST?>portfolio/<?=$project['id']?>"><?=$project['title']?></a></h4>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</section>
