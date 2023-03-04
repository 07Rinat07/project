<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<form class="admin-form" method="POST" action="<?=HOST?>admin/product-delete?id=<?=$product->id?>">
		<div class="admin-form__item">
			<h2 class="heading">Удалить товар</h2>
		</div>
		<div class="admin-form__item">
			<p><strong>Вы действительно хотите удалить товар?</strong></p>	
			<p><strong>id: </strong><?=$product->id?></p>
			<p><strong>Название: </strong><?=$product->title?></p>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button primary-button--red" name="delete" type="submit">Удалить</button>
			<a class="secondary-button" href="<?=HOST?>admin/shop">Отмена</a>
		</div>
	</form>
</div>
