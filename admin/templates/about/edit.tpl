<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form 
		class="admin-form" 
		method="POST" 
		action="<?=HOST?>admin/about"
		>

		<div class="admin-form__item">
			<h2 class="heading">Редактировать страницу об авторе</h2>
		</div>

		<h3 class="admin-section-title">Обо мне</h3>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок
				<input 
					name="about_title" 
					class="input input--width-label" 
					type="text" 
					placeholder="Введите заголовок" 
					value="<?=$about['about_title']?>" 
					/>
			</label>
		</div>
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Текст</label> 
			<textarea id="about_text" name="about_text" class="textarea textarea--width-label" placeholder="Введите текст"><?=$about['about_text']?></textarea>
		</div>

		<h3 class="admin-section-title">Чем могу быть полезен </h3>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок 
				<input name="services_title" class="input input--width-label" type="text" placeholder="Введите заголовок" value="<?=$about['services_title']?>" />
			</label>
		</div>
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">
				Текст
			</label> 
			<textarea id="services_text" name="services_text" class="textarea textarea--width-label" placeholder="Введите текст"><?=$about['services_text']?></textarea>
		</div>

		<h3 class="admin-section-title">Секция навыки</h3>
		<div class="admin-form__item">				
			<label class="checkbox__item">
				<input name="skills_status_on" class="checkbox__btn" type="checkbox"  <?php echo isset($about['skills_status_on']) && $about['skills_status_on'] == 'on' ? 'checked' : null ?> >
				<span class="checkbox__label">Показывать секцию навыки</span>
			</label>
		</div>

		<h3 class="admin-section-title">Секция опыт работы</h3>
		<div class="admin-form__item">				
			<label class="checkbox__item">
				<input name="experience_status_on" class="checkbox__btn" type="checkbox"  <?php echo isset($about['experience_status_on']) && $about['experience_status_on'] == 'on' ? 'checked' : null ?> >
				<span class="checkbox__label">Показывать секцию опыт работы</span>
			</label>
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