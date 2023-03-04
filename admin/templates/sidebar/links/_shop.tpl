<li class="control-panel__list-item">
	<div class="control-panel__list-link">
		<div class="control-panel__list-img-wrapper">
			<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/shop.svg" alt="icon" />
		</div>
		Магазин
	</div>
	<ul class="control-panel__list">
		<li class="control-panel__list-item">
			<a class="control-panel__list-link control-panel__inner-link" href="<?=HOST?>admin/shop">
				<div class="control-panel__list-img-wrapper">
					<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/corner.svg" alt="icon"/>
				</div>
				Каталог
			</a>
		</li>
		<li class="control-panel__list-item">
			<a class="control-panel__list-link control-panel__inner-link" href="<?=HOST?>admin/orders">
				<div class="control-panel__list-img-wrapper">
					<img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/corner.svg" alt="icon" />
					<?php if ( $ordersNewCounter > 0 ): ?>
						<div class="control-panel__list-img-badge"><?=$ordersNewCounter?>
						</div>
					<?php endif ?>
				</div>
				Заказы
			</a>
		</li>
	</ul>
</li>