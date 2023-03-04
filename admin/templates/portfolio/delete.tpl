<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<form class="admin-form" method="POST" action="<?=HOST?>admin/project-delete?id=<?=$project->id?>">
		
		<div class="admin-form__item">
			<h2 class="heading">Удалить проект</h2>
		</div>
		
		<div class="admin-form__item">
			<p><strong>Вы действительно хотите удалить проект?</strong></p>	
			<p><strong>id: </strong><?=$project->id?></p>
			<p><strong>Название проекта: </strong><?=$project->title?></p>
		</div>
		
		<div class="admin-form__item buttons">
			<button class="primary-button primary-button--red" name="delete" type="submit">Удалить</button>
			<a class="secondary-button" href="<?=HOST?>admin/portfolio">Отмена</a>
		</div>

	</form>
</div>
