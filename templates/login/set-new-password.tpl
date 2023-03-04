<form class="authorization-form" method="POST" action="<?=HOST?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль</h2>
    </div>
    <?php include ROOT . "templates/_components/_errors.tpl"; ?>
    <?php include ROOT . "templates/_components/_success.tpl"; ?> 
    
<?php if ( !isset($newPasswordReady) OR $newPasswordReady !== true ): ?>

    <div class="authorization-form__input">
        <input class="input" name="password" type="password" placeholder="Новый пароль" />
    </div>
    
    <div class="authorization-form__input">
        <input class="input" name="resetEmail" type="hidden" value="<?=$_GET['email']?>" />
    </div>
    <div class="authorization-form__input">
        <input class="input" name="resetCode" type="hidden" value="<?=$_GET['code']?>" />
    </div>

    <div class="authorization-form__button">
        <button name="set-new-password" value="set-new-password" class="primary-button" type="submit">Установить пароль</button>
    </div>

 <?php endif; ?>

    <div class="authorization-form__links"><a href="<?=HOST?>login">Войти на сайт</a><a href="<?=HOST?>registration">Регистрация</a></div>
</form>




