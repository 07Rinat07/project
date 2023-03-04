<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<div style="line-height: 1.5em;" class="admin-form" >
		
		<div class="admin-form__item">
			<h2 class="heading">Заказ № <?=$order['id']?></h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Дата и время заказа
			</label>
			<p><?=rus_date('j F Y года H:i', $order['time'])?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Имя и фамилия
			</label>
			<p><?=$order['name']?> <?=$order['surname']?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				E-mail
			</label>
			<p><?=$order['email']?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Телефон
			</label>
			<p><?=$order['phone']?></p>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Адрес доставки
			</label>
			<p><?=$order['adress']?></p>
		</div>


		<div class="admin-form__item">
			<label class="input__label mb-10">
				Состав заказа
			</label>
			<?php foreach ($products as $product): ?>
				<p>
					Наименование: 
					<a target="_blank" href="<?=HOST?>shop/<?=$product['id']?>"><?=$product['title']?></a>
					, количество: 
					<?=$cart[$product['id']]?>
					шт., 
					стоимость: 
					<?= $cart[$product['id']] * $product['price'] ?> 
					тенге.
				</p>
			<?php endforeach ?>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Итого: 
			</label>
			<p>
				Количество шт.: <?=$cartCount?>, общая сумма: <?=$cartTotalPrice?> тенге.
			</p>
		</div>		
		<div class="admin-form__item buttons">
			<a class="secondary-button" href="<?=HOST?>admin/orders">Назад</a>
			
			<?php if ( isset($order['status']) && $order['status'] == 'new' ): ?>
				<a class="primary-button" href="<?=HOST?>admin/orders?action=finish&id=<?=$order['id']?>">Завершить заказ</a>
			<?php endif ?>

			<a class="primary-button primary-button--red" href="<?=HOST?>admin/orders?>">Удалить</a>
		</div>
	</div>
</div>






				
			


