<form class="authorization-form" method="POST" action="<?=HOST?>registration"> 
	<div class="authorization-form__heading">
		<h2 class="heading">Регистрация </h2>
	</div>
	<?php include ROOT . "templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "templates/_components/_success.tpl"; ?>	

	<div class="authorization-form__input">
		<input name="email" class="input" type="text" placeholder="Email" 
		<?php echo isset($_POST['email']) ? 'value="' . $_POST['email'] . '"' : ''; ?>
		/>
	</div>

	<div class="authorization-form__input">
		<input name="password" class="input" type="password" placeholder="Пароль" />
	</div>
	<div class="authorization-form__button">
		<button name="register" value="register" class="primary-button" type="submit">Зарегистрироваться</button>
	</div>
	<div class="authorization-form__links"><a href="<?=HOST?>login">Вход на сайт</a></div>
</form>