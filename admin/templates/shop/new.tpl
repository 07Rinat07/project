<script src="<?=HOST?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form class="admin-form" enctype="multipart/form-data" method="POST" action="<?=HOST?>admin/product-new">
		
		<div class="admin-form__item">
			<h2 class="heading">Добавить товар</h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Название товара 
				<input name="title" class="input input--width-label" type="text" placeholder="Введите название товара" />
			</label>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Цена товара 
				<input name="price" class="input input--width-label" type="text" placeholder="Введите цену товара" />
			</label>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Описание товара</label> 
			<textarea id="editor" name="description" class="textarea textarea--width-label" placeholder="Введите описание товара"></textarea>
		</div>

		<div class="admin-form__item">
			<div class="block-upload">
				<div class="block-upload__description">
					<div class="block-upload__title">Изображение товара</div>
					<p>Изображение jpg, gif или png, ширина не менее 540px, высота не менее 380px. Вес до 2Мб.</p>
					<div class="block-upload__file-wrapper">
						<input name="image" class="file-button" type="file">
					</div>
				</div>
			</div>
		</div>

		<div class="admin-form__item buttons">
			<button class="primary-button" name="submit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
		</div>

	</form>
</div>

<script>
	CKEDITOR.replace('editor', {  
   		filebrowserUploadMethod: 'form',
    	filebrowserUploadUrl: '<?=HOST?>libs/ck-upload/upload.php'
		});
</script>