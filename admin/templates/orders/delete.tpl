<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form 
		class="admin-form" 
		method="POST" 
		action="<?=HOST?>admin/order-delete?id=<?=$order['id']?>"
		>
		
		<div class="admin-form__item">
			<h2 class="heading">Удалить заказ</h2>
		</div>
		
		<div class="admin-form__item">
			<p><strong>Вы действительно хотите удалить заказ?</strong></p>	
			<p><strong>id: </strong><?=$order['id']?></p>
			<p><strong>Имя и фамилия: </strong><?=$order['name']?> <?=$order['surname']?></p>
			<p><strong>E-mail: </strong><?=$order['email']?></p>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button primary-button--red" name="delete" type="submit">Удалить</button>
			<a class="secondary-button" href="<?=HOST?>admin/orders">Отмена</a>
		</div>
	</form>
</div>
