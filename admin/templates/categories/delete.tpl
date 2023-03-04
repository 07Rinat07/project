<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<form class="admin-form" method="POST" action="<?=HOST?>admin/category-delete?id=<?=$category->id?>">
		<div class="admin-form__item">
			<h2 class="heading">Удалить категорию</h2>
		</div>
		<div class="admin-form__item">
			<p><strong>Вы действительно хотите удалить категорию?</strong></p>	
			<p><strong>id: </strong><?=$category->id?></p>
			<p><strong>Название: </strong><?=$category->title?></p>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button primary-button--red" name="delete" type="submit">Удалить</button>
			<a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
		</div>
	</form>
</div>
