<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<form class="admin-form" method="POST" action="<?=HOST?>admin/category-new">
		<div class="admin-form__item">
			<h2 class="heading">Добавить категорию</h2>
		</div>
		<div class="admin-form__item">
			<label class="input__label">
				Название категории 
				<input name="name" class="input input--width-label" type="text" placeholder="Название категории" />
			</label>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
		</div>
	</form>
</div>