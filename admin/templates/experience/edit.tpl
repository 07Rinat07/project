<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<form 	
		class="admin-form"
		method="POST" 
		action="<?=HOST?>admin/workplace-edit?id=<?=$workplace['id']?>"
		>
		
		<div class="admin-form__item">
			<h2 class="heading">Редактировать опыт работы</h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Должность
				<input 
					name="title" 
					class="input input--width-label" 
					type="text" 
					placeholder="Введите должность" 
					value="<?php echo isset($workplace['title']) && !empty($workplace['title']) ? $workplace['title'] : ''?>"
					/>
			</label>
		</div>

		<div class="admin-form__item">
			<label class="textarea__label mb-10" for="editor">Описание</label> 
			<textarea name="description" class="textarea textarea--width-label" placeholder="Введите описание"><?php echo isset($workplace['description']) && !empty($workplace['description']) ? $workplace['description'] : ''?></textarea>
		</div>
		
		<div class="admin-form__item">
			<label class="input__label">
				Дата начала работы
				<input 
					name="time_start" 
					class="input input--width-label" 
					type="text" 
					placeholder="Дата начала работы (месяц и год)" 
					value="<?php echo isset($workplace['time_start']) && !empty($workplace['time_start']) ? $workplace['time_start'] : ''?>"
					/>
			</label>
		</div>

		<div class="admin-form__item">
			<label class="input__label">
				Дата окончания работы
				<input 
					name="time_end" 
					class="input input--width-label" 
					type="text" 
					placeholder="Дата окончания работы (месяц и год)" 
					value="<?php echo isset($workplace['time_end']) && !empty($workplace['time_end']) ? $workplace['time_end'] : ''?>"
					/>
			</label>
		</div>
		
		<div class="admin-form__item buttons">
			<button class="primary-button" name="edit" type="submit">Сохранить</button>
			<a class="secondary-button" href="<?=HOST?>admin/experience">Отмена</a>
		</div>

	</form>
</div>