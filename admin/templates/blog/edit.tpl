<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>
<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<form 
			class="admin-form" 
			enctype="multipart/form-data" 
			method="POST" 
			action="<?=HOST?>admin/post-edit?id=<?=$post->id?>">
		<div class="admin-form__item">
			<h2 class="heading">Редактировать пост</h2>
		</div>
		<div class="admin-form__item">
			<label class="input__label">
				Заголовок поста 
				<input name="title" class="input input--width-label" type="text" placeholder="Введите заголовок" value="<?=$post->title?>" />
			</label>
		</div>
		<div class="admin-form__item">
			<label class="select-label">Категория
				<select name="category" class="select">
					<?php foreach ($categories as $category): ?>
						<option value="<?=$category->id?>" <?php echo $category->id == $post->category ? 'selected' : ''?>>
							<?=$category->title?>
						</option>
					<?php endforeach ?>
				</select>
			</label>
		</div>
		<!-- <div class="admin-form__item">
			<div class="radio">
				<div class="radio__title">Статус публикации</div>
				<label class="radio__item">
					<input class="radio__btn" type="radio" name="status" value="draft" />
					<span class="radio__label">Черновик</span>
				</label>
				<label class="radio__item">
					<input class="radio__btn" type="radio" name="status" value="published" />
					<span class="radio__label">Опубликовано</span>
				</label>
			</div>
		</div>
		<div class="admin-form__item">
			<div class="checkboxes">
				<div class="checkbox__title">Продвигать запись</div>
				<label class="checkbox__item">
					<input class="checkbox__btn" type="checkbox" name="onmain" />
					<span class="checkbox__label">Показывать на главной</span>
				</label>
				<label class="checkbox__item">
					<input class="checkbox__btn" type="checkbox" name="popular" />
					<span class="checkbox__label">Популярные</span>
				</label>
				<label class="checkbox__item">
					<input class="checkbox__btn" type="checkbox" name="recomended" />
					<span class="checkbox__label">Рекомендованные</span>
				</label>
			</div>
		</div> -->
		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Содержимое поста</label> 
			<textarea id="editor" name="content" class="textarea textarea--width-label" placeholder="Введите текст поста"><?=$post->content?></textarea>
		</div>
		<div class="admin-form__item">

			<div class="block-upload">
				<div class="block-upload__description">
					<div class="block-upload__title">Обложка поста</div>
					<p>Изображение jpg, gif или png, ширина не менее 600px, высота не менее 300px. Вес до 4Мб.</p>
					<div class="block-upload__file-wrapper">
						<input name="cover" class="file-button" type="file">
					</div>
				</div>
				<?php if ( !empty($post->cover) ): ?>
					<div class="block-upload__img">
						<img src="<?=HOST?>usercontent/blog/<?=$post->cover_small?>" alt="Загрузка картинки" />						
						<label class="checkbox__item mt-15">
							<input name="delete-cover" class="checkbox__btn" type="checkbox">
							<span class="checkbox__label">Удалить фотографию</span>
						</label>
					</div>
				<?php endif ?>
			</div>
		</div>
		<div class="admin-form__item buttons">
			<button class="primary-button" name="edit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
		</div>
		<div class="admin-form__item"></div>
		<div class="admin-form__item"></div>
	</form>
</div>

<script>
	CKEDITOR.replace('editor', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});
</script>