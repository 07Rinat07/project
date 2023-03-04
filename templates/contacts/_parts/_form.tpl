<form id="contactForm" enctype="multipart/form-data" action="<?=HOST?>contacts" method="POST" class="feedback-form">

	<div class="feedback-form__heading">
		<h2 class="heading">Напишите мне </h2>
	</div>

	<?php include ROOT . "templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "templates/_components/_success.tpl"; ?> 

	<div class="feedback-form__input">
		<input enctype="multipart/form-data" name="name" class="input" type="text" placeholder="Ваше имя" />
	</div>

	<div class="feedback-form__input">
		<input name="email" class="input" type="text" placeholder="Email" />
	</div>

	<div class="feedback-form__input">
		<textarea name="text" class="textarea" placeholder="Введите сообщение"></textarea>
	</div>

	<button class="primary-button" name="submit" type="submit">Отправить</button>
</form>