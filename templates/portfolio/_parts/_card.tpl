<div class="card-project">
	<div class="card-project__img-wrapper">
		<a href="<?=HOST?>portfolio/<?=$project['id']?>">
			<img 
				src="<?=HOST?>usercontent/portfolio/<?php echo isset($project['cover_small']) && !empty($project['cover_small']) && file_exists(ROOT . 'usercontent/portfolio/' . $project['cover_small']) ? $project['cover_small'] : '_no-cover.jpg'; ?>" 
				alt="<?=$project['title']?>" />
			
			<?php if ( isset($project['tags']) && !empty($project['tags']) ): 
				$tags = explode(", ", $project['tags']); ?>
				<div class="card-project__technology">
					<?php foreach ($tags as $tag): ?>
						<a href="<?=HOST?>portfolio?tag=<?=$tag?>"><?=$tag?></a>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		</a>
	</div>
	<h4 class="card-project__title">
		<a href="<?=HOST?>portfolio/<?=$project['id']?>">
			<?=$project['title']?>
		</a>
	</h4>
</div>

				
				