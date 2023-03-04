<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<form 
		class="admin-form" 
		enctype="multipart/form-data" 
		method="POST" 
		action="<?=HOST?>admin/project-edit?id=<?=$project->id?>"
		>
		
		<div class="admin-form__item">
			<h2 class="heading">Редактировать проект</h2>
		</div>
		

		<div class="admin-form__item">
			<label class="input__label">
				Название проекта
				<input name="title" class="input input--width-label" type="text" placeholder="Название проекта" value="<?=$project->title?>"/>
			</label>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">
				Описание проекта
			</label> 
			<textarea id="about" name="about" class="textarea textarea--width-label" placeholder="Описание проекта"><?=$project->about?></textarea>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">
				Технологии
			</label> 
			<textarea id="technologies" name="technologies" class="textarea textarea--width-label" placeholder="Укажите технологии, использованные в проекте"><?=$project->technologies?></textarea>
		</div>
		<div class="admin-form__item">
			<label class="input__label">
				Тэги 
				<input name="tags" class="input input--width-label" type="text" placeholder="Тэги" value="<?=$project->tags?>"/>
			</label>
		</div>	
		<div class="admin-form__item">
			<label class="input__label">
				Ссылка на проект
				<input name="link" class="input input--width-label" type="text" placeholder="Укажите ссылку на проект" value="<?=$project->link?>"/>
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
				<?php if ( isset($project->cover) && !empty($project->cover) ): ?>
					<div class="block-upload__img">
						<img src="<?=HOST?>usercontent/portfolio/<?=$project->cover_small?>" alt="Загрузка картинки" />						
						<label class="checkbox__item mt-15">
							<input name="delete-cover" class="checkbox__btn" type="checkbox">
							<span class="checkbox__label">Удалить обложку</span>
						</label>
					</div>
				<?php endif ?>
			</div>
		</div>

		<div class="admin-form__item buttons">
			<button class="primary-button" name="edit" type="submit">Сохранить</button>
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