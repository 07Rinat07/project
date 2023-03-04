<h3 class="admin-section-title">Секция "Статус"</h3>

<div class="admin-form__item">				
	<label class="checkbox__item">
		<input name="status_on" class="checkbox__btn" type="checkbox"  <?php echo isset($settings['status_on']) && $settings['status_on'] == 'on' ? 'checked' : null ?> >
		<span class="checkbox__label">Показывать секцию "Статус"</span>
	</label>
</div>
<div class="admin-form__item">
	<label class="input__label">
		Текст на кнопке
		<input name="status_label" class="input input--width-label" type="text" placeholder="Введите текст" value="<?=$settings['status_label']?>" />
	</label>
</div>
<div class="admin-form__item">
	<label class="input__label">
		Текст справа от кнопки
		<input name="status_text" class="input input--width-label" type="text" placeholder="Введите текст" value="<?=$settings['status_text']?>" />
	</label>
</div>
<div class="admin-form__item">
	<label class="input__label">
		Ссылка 
		<input name="status_link" class="input input--width-label" type="text" placeholder="Введите ссылку" value="<?=$settings['status_link']?>" />
	</label>
</div>