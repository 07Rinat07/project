<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<form class="admin-form" method="POST" action="<?=HOST?>admin/contacts">
		<div class="admin-form__item">
			<h2 class="heading">Редактировать контакты</h2>
		</div>

		<h3 class="admin-section-title">Обо мне</h3>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок
				<input name="about_title" class="input input--width-label" type="text" placeholder="Введите заголовок" value="<?=$contacts['about_title']?>" />
			</label>
		</div>
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Текст</label> 
			<textarea id="about_text" name="about_text" class="textarea textarea--width-label" placeholder="Введите текст"><?=$contacts['about_text']?></textarea>
		</div>

		<h3 class="admin-section-title">Услуги</h3>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок 
				<input name="services_title" class="input input--width-label" type="text" placeholder="Введите заголовок" value="<?=$contacts['services_title']?>" />
			</label>
		</div>
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Содержимое поста</label> 
			<textarea id="services_text" name="services_text" class="textarea textarea--width-label" placeholder="Введите текст"><?=$contacts['services_text']?></textarea>
		</div>

		<h3 class="admin-section-title">Контактные данные</h3>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок 
				<input name="contacts_title" class="input input--width-label" type="text" placeholder="Введите заголовок" value="<?=$contacts['contacts_title']?>" />
			</label>
		</div>
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Содержимое поста</label> 
			<textarea id="contacts_text" name="contacts_text" class="textarea textarea--width-label" placeholder="Введите текст"><?=$contacts['contacts_text']?></textarea>
		</div>

		<div class="admin-form__item buttons">
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
		</div>
	</form>
</div>

<script>
	CKEDITOR.replace('about_text', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});

	CKEDITOR.replace('services_text', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});

	CKEDITOR.replace('contacts_text', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});

</script>