<?php if ( isset($about['experience_status_on']) &&  $about['experience_status_on'] === 'on' ): ?>
	<div class="section-timeline">
		<div class="container">
			<div class="row">
				<div class="col-12 section-timeline__title">
					<h2 class="heading">Опыт работы </h2>
				</div>
				<?php foreach ($experience as $workplace): ?>
					<div class="col-12 section-timeline__item-wrapper">
						<div class="timeline-item">
							<div class="timeline-item__info"><?=$workplace['time_start']?> — <?=$workplace['time_end']?></div>
							<h4 class="timeline-item__title"><?=$workplace['title']?></h4>
							<div class="timeline-item__content">
								<?=$workplace['description']?>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>