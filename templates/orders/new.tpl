<main>
	<div class="container">
		<div class="order-registration">
			<?php include ROOT . "templates/_components/_errors.tpl"; ?>
			<?php include ROOT . "templates/_components/_success.tpl"; ?> 
			<div class="order-registration__title">
				<h2 class="section-title">Состав заказа</h2>
			</div>
			<table class="order-table">
				<thead>
					<tr>
						<th>Наименование товаров</th>
						<th>Количество</th>
						<th>Стоимость</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php
								foreach ($products as $key => $product) {
									echo $product['title'];
									echo $key !== array_key_last($products) ? ', ' : '.' ;
								}
							?>
						</td>
						<td><?=$cartCount?> шт.</td>
						<td><?=$cartTotalPrice?> тенге.</td>
					</tr>
				</tbody>
			</table>
			<div class="order-registration__title">
				<h1 class="section-title">Оформить заказ</h1>
			</div>
			<form class="order-form" name="order-registration" action="<?=HOST?>new-order" method="POST">
				<div class="order-form__row">
					<label>
						<p class="order-form__name">Имя</p>
						<input class="input-text" type="text" placeholder="Введите имя" id="form-title" name="name" value="<?php echo isLoggedIn() && !empty($_SESSION['logged_user']->name) ? $_SESSION['logged_user']->name : null ?>"/>
					</label>

					<label>
						<p class="order-form__name">Фамилия</p>
						<input class="input-text" type="text" placeholder="Введите фамилию" id="form-title" name="surname" value="<?php echo isLoggedIn() && !empty($_SESSION['logged_user']->surname) ? $_SESSION['logged_user']->surname : null ?>"/>
					</label>
				</div>
				<div class="order-form__row">
					<label>
						<?php 
							$value = null;

							if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['email']) ) {
								$value = 'value="' . $_SESSION['logged_user']['email'] . '"';
							}
						?>
						<p class="order-form__name">Email</p>
							<input class="input-text" type="text" placeholder="Введите email" id="form-title" name="email" <?=$value?>/>
					</label>
					<label>
						<p class="order-form__name">Телефон</p>
							<input class="input-text" type="text" placeholder="Введите телефон" id="form-title" name="phone" />
					</label>
				</div>
				<div class="order-form__row">
					<label>
						<p class="order-form__name">Адрес доставки</p>
						<textarea class="textarea" name="adress" placeholder="Введите адрес доставки" title="Адрес доставки"></textarea>
					</label>
				</div>
				<div class="order-form__row order-form__row--justify-between">
					<button type="submit" name="submit" class="primary-button">Оформить заказ </button>
					<a class="secondary-button" href="<?=HOST?>cart">Вернуться в корзину </a>
				</div>
			</form>
		</div>
	</div>
</main>