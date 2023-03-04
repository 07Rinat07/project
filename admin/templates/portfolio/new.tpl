<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<form class="admin-form" enctype="multipart/form-data" method="POST" action="<?=HOST?>admin/project-new">
		<div class="admin-form__item">
			<h2 class="heading">Добавить проект</h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Название проекта
				<input name="title" class="input input--width-label" type="text" placeholder="Введите название проекта" />
			</label>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">
				Описание проекта
			</label> 
			<textarea id="about" name="about" class="textarea textarea--width-label" placeholder="Введите описание проекта"></textarea>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">
				Технологии
			</label> 
			<textarea id="technologies" name="technologies" class="textarea textarea--width-label" placeholder="Укажите технологии, использованные в проекте"></textarea>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Ссылка на проект
				<input name="link" class="input input--width-label" type="text" placeholder="Укажите ссылку на проект" />
			</label>
		</div>	
		<div class="admin-form__item">
			<label class="input__label">
				Тэги 
				<input name="tags" class="input input--width-label" type="text" placeholder="Введите тэги" />
			</label>
		</div>	
		<div class="admin-form__item">
			<div class="block-upload">
				<div class="block-upload__description">
					<div class="block-upload__title">Обложка проекта</div>
					<p>Изображение jpg, gif или png, ширина не менее 1110px, высота не менее 935px. Вес до 4Мб.</p>
					<div class="block-upload__file-wrapper">
						<input name="cover" class="file-button" type="file">
					</div>
				</div>
			</div>
		</div>

		<div class="admin-form__item buttons">
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/portfolio">Отмена</a>
		</div>

	</form>
</div>
<script>
	CKEDITOR.replace('about', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});

	CKEDITOR.replace('technologies', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});
</script>
