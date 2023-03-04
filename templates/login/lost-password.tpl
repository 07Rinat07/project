<form class="authorization-form" method="POST" action="<?=HOST?>lost-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Восстановить пароль</h2>
    </div>
    <?php include ROOT . "templates/_components/_errors.tpl"; ?>
    <?php include ROOT . "templates/_components/_success.tpl"; ?> 
    <div class="authorization-form__input" >
        <input class="input" name="email" type="text" placeholder="Email" />
    </div>
    <div class="authorization-form__button">
        <button name="lost-password" value="lost-password" class="primary-button" type="submit">Восстановить пароль</button>
    </div>
    <div class="authorization-form__links"><a href="<?=HOST?>login">Вход на сайт</a><a href="<?=HOST?>registration">Регистрация</a></div>
</form>




