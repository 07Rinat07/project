<main class="page-project">
	<div class="container">
		<div class="page-project__title">
			<h1 class="heading"><?=$project['title']?></h1>
			<div class="page-project__info">
				<div class="page-project__date"><?=rus_date('d F Y', $project['timestamp'])?></div>
				<?php if ( isset($project['tags']) && !empty($project['tags']) ): 
					$tags = explode(", ", $project['tags']);
					foreach ($tags as $tag): ?>
						<a href="<?=HOST?>portfolio?tag=<?=$tag?>"><div class="badge mr-1"><?=$tag?></div></a>
					<?php endforeach;
				endif; ?>
			</div>
		</div>
		<?php if ( isset($project['cover']) && !empty($project['cover']) && file_exists(ROOT . 'usercontent/portfolio/' . $project['cover']) ): ?>
		<div class="page-project__preview">
			<img src="<?=HOST?>usercontent/portfolio/<?=$project['cover']?>" alt="<?=$project['title']?>" />
		</div>
		<?php endif ?>
		<div class="page-project__content">
			<div class="row">
				
				<div class="col-md-6">
					<div class="page-project__content-item">
						<h4 class="heading">Кратко о проекте</h4>
						<?=$project['about']?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="page-project__content-item">
						<h4 class="heading">Технологии</h4>
						<?=$project['technologies']?>
					</div>
					<div class="page-project__content-item">
						<h4 class="heading">Ссылка на проект</h4>
						<p class="special-link">
							<a href="<?=$project['title']?>">
								<?=$project['link']?>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include ROOT . 'templates/portfolio/_parts/_nav.tpl' ?>
	<?php include ROOT . 'templates/portfolio/_parts/_related.tpl' ?>
</main>