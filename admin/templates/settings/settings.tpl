<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?>

	<form class="admin-form" method="POST" action="<?=HOST?>admin/settings">
		
		<div class="admin-form__item">
			<h2 class="heading">Настройки сайта</h2>
		</div>

		<?php include ROOT . "admin/templates/settings/seсtions/_general.tpl"; ?>
		<?php include ROOT . "admin/templates/settings/seсtions/_copyright.tpl"; ?>
		<?php include ROOT . "admin/templates/settings/seсtions/_status.tpl"; ?>
		<?php include ROOT . "admin/templates/settings/seсtions/_social.tpl"; ?>

		<div class="admin-form__item buttons">	
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
		</div>
	</form>
</div>



