<form class="authorization-form" method="POST" action="<?=HOST?>login">
    <div class="authorization-form__heading">
        <h2 class="heading">Вход на сайт </h2>
    </div>
    <?php include ROOT . "templates/_components/_errors.tpl"; ?>
    <?php include ROOT . "templates/_components/_success.tpl"; ?> 
    <div class="authorization-form__input" >
        <label style="display: block;" title="admin@admin.ru (админ, id=1), user@user.ru (пользователь, id=2)">
            <input class="input" name="email" type="text" placeholder="Email" 
            <?php echo isset($_POST['email']) ? 'value="' . $_POST['email'] . '"' : ''; ?>
            />
        <label>
    </div>
    <div class="authorization-form__input">

        <label style="display: block;" title="Пароль для всех пользователей: 12345">
            <input class="input" name="password" type="password" placeholder="Пароль" />
        <label>
    </div>
    <div class="authorization-form__button">
        <button name="login" value="login" class="primary-button" type="submit">Вход на сайт</button>
    </div>
    <div class="authorization-form__links"><a href="<?=HOST?>lost-password">Забыл пароль</a><a href="<?=HOST?>registration">Регистрация</a></div>
</form>




