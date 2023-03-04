<li class="control-panel__list-item">
	<div class="control-panel__list-link">
		<div class="control-panel__list-img-wrapper">
			<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/book.svg" alt="icon" />
		</div>
		Блог
	</div>
	<ul class="control-panel__list">
		<li class="control-panel__list-item">
			<a class="control-panel__list-link control-panel__inner-link" href="<?=HOST?>admin/blog">
				<div class="control-panel__list-img-wrapper">
					<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/corner.svg" alt="icon"/>
				</div>
				Все записи
			</a>
		</li>
		<li class="control-panel__list-item">
			<a class="control-panel__list-link control-panel__inner-link" href="<?=HOST?>admin/categories">
				<div class="control-panel__list-img-wrapper">
					<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/corner.svg" alt="icon" />
				</div>
				Категории
			</a>
		</li>
		<li class="control-panel__list-item">
			<a class="control-panel__list-link control-panel__inner-link" href="<?=HOST?>admin/comments">
				<div class="control-panel__list-img-wrapper">
					<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/corner.svg" alt="icon" />
					<?php if ( $commentsNewCounter > 0 ): ?>
						<div class="control-panel__list-img-badge"><?=$commentsNewCounter?>
						</div>
					<?php endif ?>
				</div>
				Комментарии
			</a>
		</li>
	</ul>
</li>