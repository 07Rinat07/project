<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<form style="line-height: 1.5em;" class="admin-form" method="POST" action="">
		
		<div class="admin-form__item">
			<h2 class="heading">Комментарий</h2>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Дата и время отправки
			</label>
			<p><?=rus_date('d.m.Y H:i', $comment['timestamp'])?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Имя и фамилия отправителя
			</label>
			<p><?=$comment['user_name']?> <?=$comment['user_surname']?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Email отправителя
			</label>
			<p><?=$comment['user_email']?></p>
		</div>

		<div class="admin-form__item">
			<label class="input__label mb-10">
				Текст комментария
			</label>
			<p><?=$comment['text']?></p>
		</div>

		<div class="admin-form__item buttons">
			<a class="secondary-button" href="<?=HOST?>admin/comments">Назад</a>
			<?php if ( isset($comment['status']) && $comment['status'] == 'new' ): ?>
				<a class="primary-button" href="<?=HOST?>admin/comments?action=publish&id=<?=$comment['id']?>">Опубликовать</a>
			<?php endif ?>
			<a class="primary-button primary-button--red" href="<?=HOST?>admin/comments?action=delete&id=<?=$comment['id']?>">Удалить</a>
		</div>
	</form>
</div>
