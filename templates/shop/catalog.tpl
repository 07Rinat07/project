<main>
	<div class="container">
		<section class="shop">
			<div class="text-center">
				<h2 class="section-title">Каталог товаров</h2>
			</div>
			<div class="shop-cards">
				<?php foreach ($products as $product) {
					include ROOT . 'templates/shop/_parts/_card.tpl';
				} ?>
			</div>
			<div class="page-blog__pagination">
				<?php include ROOT . "templates/_parts/_pagination.tpl" ?>
			</div>
		</section>
	</div>
</main>