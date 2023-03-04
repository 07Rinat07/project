<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form 	
		class="admin-form"
		method="POST" 
		action="<?=HOST?>admin/workplace-new"
		>
		
		<div class="admin-form__item">
			<h2 class="heading">Добавить место работы</h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Должность
				<input name="title" class="input input--width-label" type="text" placeholder="Заголовок поста" />
			</label>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Описание</label> 
			<textarea name="description" class="textarea textarea--width-label" placeholder="Введите текст"></textarea>
		</div>
		
		<div class="admin-form__item">
			<label class="input__label">
				Дата начала работы
				<input name="time_start" class="input input--width-label" type="text" placeholder="Заголовок поста" />
			</label>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Дата окончания работы
				<input name="time_end" class="input input--width-label" type="text" placeholder="Заголовок поста" />
			</label>
		</div>
		
		<div class="admin-form__item buttons">
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/experience">Отмена</a>
		</div>

	</form>
</div>
