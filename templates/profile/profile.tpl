<?php if ( isset($userNotLoggedIn) ): ?>

<main class="page-profile">
	<div class="section">
		<div class="container">
			<div class="section__title">
				<h2 class="heading mb-25">Профиль пользователя</h2>
				<p>
					Чтобы посмотреть свой профиль, 
					<a href="<?=HOST?>login">войдите</a>  
					или 
					<a href="<?=HOST?>registration">зарегистрируйтесь</a>
					.
				</p>
			</div>
		</div>
	</div>
</main>

<?php elseif ( $user['id'] === 0 ) :  ?>

<main class="page-profile">
	<div class="section">
		<div class="container">
			<div class="section__title">
				<h2 class="heading mb-25">Такого пользователя не существует</h2>
					<p><a href="<?=HOST?>">Вернуться на главную</a>
				</p>
			</div>
		</div>
	</div>
</main>

<?php else : ?>

<main class="page-profile">
	<div class="section">
		<div class="container">
			<div class="section__title">
				<h2 class="heading">Профиль пользователя </h2>
			</div>
			<div class="section__body">
				
				<div class="row justify-content-center">
					<div class="col-md-6">
						<?php include ROOT . "templates/_components/_errors.tpl"; ?>
						<?php include ROOT . "templates/_components/_success.tpl"; ?> 
					</div>
				</div>

				<?php if ( empty($user->name) && empty($user->country) && empty($user->city) ): ?>
				
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="enter-or-reg flex-column">
							<div class="enter-or-reg__text mb-25">
								🙁 Пустой профиль.
							</div>	
							<?php include ROOT . "templates/profile/_parts/button-edit.tpl"?>
						</div>
					</div>
				</div>
				
				<?php else : ?>

				<div class="row justify-content-center">
					<div class="col-md-2">
						<div class="avatar-big">
							<img src="<?=HOST?>usercontent/avatars/<?php echo !empty($user->avatar) ? $user->avatar : '_no-avatar.svg' ?>" alt="Аватарка" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="definition-list mb-20">

							<?php if ( !empty($user->name) && !empty($user->surname) ): ?>
							<dl class="definition">
								<dt class="definition__term">имя и фамилия</dt>
								<dd class="definition__description"><?=$user->name?> <?=$user->surname?></dd>
							</dl>
							<?php endif ?>

							<?php if ( !empty($user->country) OR !empty($user->city) ): ?>
							<dl class="definition">
								<dt class="definition__term">
									<?php if ( !empty($user->country) && empty($user->city) ): ?>
										Страна
									<?php elseif ( empty($user->country) && !empty($user->city) ): ?>
										Город
									<?php else: ?>
										Страна, город
									<?php endif ?>										
								</dt>
								<dd class="definition__description">
									<?php if ( !empty($user->country) && empty($user->city) ):
										echo $user->country;
									elseif ( empty($user->country) && !empty($user->city) ):
										echo $user->city;
									else:
										echo $user->country . ', ' . $user->city;
									endif; ?>	
								</dd>
							</dl>
							<?php endif; ?>
						</div>
						<?php include ROOT . "templates/profile/_parts/button-edit.tpl"?>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php if ( isset($comments) && !empty($comments) ) {
		include ROOT . "templates/profile/_parts/user-comments.tpl";
	} ?>
</main>

<?php endif; ?>