<?php if ( isset($settings['status_on']) && !empty($settings['status_on']) ): ?>
	<div class="container">
		<a class="section-status" href="<?=$settings['status_link']?>">
			<div class="section-status-badge"><?=$settings['status_label']?></div>
			<div class="section-status-text"><?=$settings['status_text']?></div>
		</a>
	</div>
<?php endif ?>