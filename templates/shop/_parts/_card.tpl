<a class="card-product" href="<?=HOST?>shop/<?=$product['id']?>">
	<div class="card-product__img"><img src="<?=HOST?>usercontent/shop/<?php echo isset($product['image_small']) && !empty($product['image_small']) && file_exists(ROOT . 'usercontent/shop/' . $product['image_small']) ? $product['image_small'] : '_no-image.jpg' ?>" alt="" /></div>
	<div class="card-product__title"><?=$product['title']?></div>
	<div class="card-product-row">
		<div class="card-product__price"> <span><?=$product['price']?> тенге.</span></div>
		<div class="card-product__button">
			<div class="watch-button">Смотреть</div>
		</div>
	</div>
</a>