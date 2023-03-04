<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<form style="line-height: 1.5em;" class="admin-form" method="POST" action="">
		<div class="admin-form__item">
			<h2 class="heading">Cообщение</h2>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Дата и время отправки
			</label>
			<p><?=rus_date('j F Y года H:i', $message->time)?></p>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Имя отправителя
			</label>
			<p><?=$message->name?></p>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				E-mail отправителя
			</label>
			<p><?=$message->email?></p>
		</div>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Текст сообщения
			</label>
			<p><?=$message->text?></p>
		</div>
		<?php if ( !empty($message->file_name_src) && !empty($message->file_name_original) ): ?>
		<div class="admin-form__item">
			<label class="input__label mb-10">
				Прикрепленный файл
			</label>
			<p>
				<a href="<?=HOST?>usercontent/contact-form/<?=$message->file_name_src?>" target="_blank">
					<?=$message->file_name_original?> 
				</a>
			</p>
		</div>
		<?php endif ?>
		<div class="admin-form__item buttons">
			<a class="secondary-button" href="<?=HOST?>admin/messages">Назад</a>
			<a class="primary-button primary-button--red" href="<?=HOST?>admin/messages?action=delete&id=<?=$message->id?>">Удалить</a>
		</div>
	</form>
</div>