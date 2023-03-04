<?php if ( $product['id'] === 0 ): ?>

	<main class="page-post">
		<section class="page-post__post">
			<div class="section-posts">
				<div class="section-posts__title">
					<h1 class="heading mb-25">Нет такого товара</h1>
					<a href="<?=HOST?>">Вернуться в каталог</a>
				</div>
			</div>
		</section>
	</main>

<?php else : ?>

	<main>
		<div class="container">
			<section class="page-product">
				<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
				<?php require ROOT . "admin/templates/_components/_success.tpl"; ?>
				<div class="page-product__row">
					<div class="page-product__col">
						<div class="page-product__img">
							<img src="<?=HOST?>usercontent/shop/<?php echo isset($product['image']) && !empty($product['image']) && file_exists(ROOT . 'usercontent/shop/' . $product['image']) ? $product['image'] : '_no-image.jpg' ?>" alt="air-13" />
						</div>
					</div>
					<div class="page-product__col">
						<div class="page-product__title">
							<h2 class="section-title"><?=$product['title']?></h2>
						</div>
						<div class="page-product__price"><?=$product['price']?> тенге.</div><a class="page-product__button primary-button" href="<?=HOST?>add-to-cart?id=<?=$product['id']?>">В корзину</a>
						<div class="page-product-text">
							<?=$product['description']?>
						</div>
					</div>
				</div>
			</section>

			<?php include ROOT . 'templates/shop/_parts/_related.tpl' ?>

		</div>
	</main>

<?php endif; ?>