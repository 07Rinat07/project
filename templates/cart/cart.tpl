<main>
	<div class="container">
		<section class="page-shopping-cart">

			<?php if ( !empty($products) ): ?>

			<h1 class="page-about-me__main-title">Корзина</h1>
			<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
			<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 
			<div class="page-shopping-cart__row-gray">
				<h2 class="page-shopping-cart__title">наименование</h2>
				<h2 class="page-shopping-cart__title">количество</h2>
				<h2 class="page-shopping-cart__title">стоимость</h2>
			</div>
			<?php foreach ($products as $product): ?>
				<div class="page-shopping-cart__row">
					<div class="page-shopping-cart__img"><img src="<?=HOST?>usercontent/shop/<?=$product['image_small']?>" alt="productName" /></div>
					<div class="page-shopping-cart__name"><a target="_blank" href="<?=HOST?>shop/<?=$product['id']?>"><?=$product['title']?></a></div>
					<div class="page-shopping-cart__id"><?=$cart[$product['id']]?></div>
					<div class="page-shopping-cart__money"><?= $cart[$product['id']] * $product['price'] ?> тенге.</div>
					<div class="page-shopping-cart__delete">
						<a href="<?=HOST?>remove-from-cart?id=<?=$product['id']?>"><span class="leftright"></span><span class="rightleft"></span></a>
					</div>
				</div>
			<?php endforeach ?>
			<div class="page-shopping-cart__row-down">
				<div class="page-shopping-cart__id"><?=$cartCount?> ед.</div>
				<div class="page-shopping-cart__money"><?=$cartTotalPrice?> тенге.</div>
			</div><a class="page-shopping-cart__button" href="<?=HOST?>new-order">Перейти к оформлению заказа</a>

			<?php else: ?>

			<h1 class="page-about-me__main-title mb-100" style="text-align: center;">Корзина пуста</h1>

			<?php endif ?>

		</section>
	</div>
</main>