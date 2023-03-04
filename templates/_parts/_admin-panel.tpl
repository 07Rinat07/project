<?php if ( isset($_SESSION['login']) && $_SESSION['login'] === 1 ) : ?>
	<div class="admin-panel">
		<div class="admin-panel__block-list">
			<?php if ( $_SESSION['role'] === 'admin' ): ?>
				<a class="admin-panel__link" href="<?=HOST?>admin">
					<img src="<?=HOST?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
					<div class="span">Панель управления</div>
				</a>
			<?php endif ?>
			<a class="admin-panel__link" href="<?=HOST?>profile">
				<img src="<?=HOST?>static/img/admin-panel/user.svg" alt=" Профиль">
				<div class="span">Профиль</div>
			</a>
			<?php if ( $_SESSION['role'] === 'admin' ): ?>
				<a class="admin-panel__link" href="<?=HOST?>admin/messages">
					<div class="admin-panel__message">
						<img src="<?=HOST?>static/img/admin-panel/mail.svg" alt=" Сообщение">
						<?php if ( $messagesNewCounter > 0 ): ?>
							<span class="admin-panel__message-icon"><?=$messagesNewCounter?></span>
						<?php endif; ?>
					</div>
					<div class="span">Сообщения</div>
				</a>
				<a class="admin-panel__link" href="<?=HOST?>admin/comments">
					<div class="admin-panel__message">
						<img src="<?=HOST?>static/img/admin-panel/message-square.svg" alt="Комментарии">
						<?php if ( $commentsNewCounter > 0 ): ?>
							<span class="admin-panel__message-icon"><?=$commentsNewCounter?></span>
						<?php endif; ?>
					</div>
					<div class="span">Комментарии</div>
				</a>
				<a class="admin-panel__link" href="<?=HOST?>admin/orders">
					<div class="admin-panel__message">
						<img src="<?=HOST?>static/img/admin-panel/shop.svg" alt="Комментарии">
						<?php if ( $ordersNewCounter > 0 ): ?>
							<span class="admin-panel__message-icon"><?=$ordersNewCounter?></span>
						<?php endif; ?>
					</div>
					<div class="span">Заказы</div>
				</a>
				<?php if ( $uriModule === 'blog' && isset($uriGet) && $uriGet !== 'cat' ): ?>
					<a class="admin-panel__link" href="<?=HOST?>admin/post-edit?id=<?=$uriGet?>">
						<img src="<?=HOST?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
						<div class="span">Редактировать</div>
					</a>
				<?php endif ?>
				<?php if ( $uriModule === 'portfolio' && isset($uriGet) ): ?>
					<a class="admin-panel__link" href="<?=HOST?>admin/project-edit?id=<?=$uriGet?>">
						<img src="<?=HOST?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
						<div class="span">Редактировать</div>
					</a>
				<?php endif ?>
				<?php if ( $uriModule === 'shop' && isset($uriGet) ): ?>
					<a class="admin-panel__link" href="<?=HOST?>admin/product-edit?id=<?=$uriGet?>">
						<img src="<?=HOST?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
						<div class="span">Редактировать</div>
					</a>
				<?php endif ?>
			<?php endif ?>
		</div>
		<div class="admin-panel__block-list">
			<a class="admin-panel__link" href="<?=HOST?>cart">Корзина (<?=$cartCount?>)</a>
			<a class="admin-panel__block-button" href="<?=HOST?>logout">Выход</a>
		</div>
	</div>
<?php else : ?>
	<div class="admin-panel">
		<div class="admin-panel__block-list">
		</div>
		<div class="admin-panel__block-list">
			<a class="admin-panel__link" href="<?=HOST?>cart">
				Корзина 
				<?php echo !empty($cartCount) ? '(' . $cartCount . ')' : null  ?>
			</a>
			<a href="<?=HOST?>login" class="admin-panel__block-button">Вход</a>
		</div>
	</div>	
<?php endif; ?>