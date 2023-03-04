<?php if (count($relatedProducts) > 0 ): ?>
	<section>
		<div class="page-product__section-title">
			<h2 class="section-title">Смотрите также</h2>
		</div>
		<div class="page-product__cards">
			<?php foreach ($relatedProducts as $product) {
				include ROOT . 'templates/shop/_parts/_card.tpl';			
			} ?>
		</div>
	</section>
<?php endif ?>