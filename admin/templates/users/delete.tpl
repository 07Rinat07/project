<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form 
		class="admin-form" 
		method="POST" 
		action="<?=HOST?>admin/user-delete?id=<?=$user->id?>"
		>
		
		<div class="admin-form__item">
			<h2 class="heading">Удалить пользователя</h2>
		</div>
		
		<div class="admin-form__item">
			<p><strong>Вы действительно хотите удалить категорию?</strong></p>	
			<p><strong>id: </strong><?=$user->id?></p>
			<p><strong>Имя: </strong><?=$user->name?></p>
			<p><strong>Фамилия: </strong><?=$user->surname?></p>
			<p><strong>Email: </strong><?=$user->email?></p>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button primary-button--red" name="delete" type="submit">Удалить</button>
			<a class="secondary-button" href="<?=HOST?>admin/users">Отмена</a>
		</div>
	</form>
</div>
