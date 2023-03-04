<?php if ( isset($settings['status_on']) && !empty($settings['status_on']) ): ?>
	<section class="main-page__section-status">
		<a class="section-status" href="<?=$settings['status_link']?>">
			<div class="section-status-badge"><?=$settings['status_label']?></div>
			<div class="section-status-text"><?=$settings['status_text']?></div>
		</a>
	</section>
<?php endif ?>