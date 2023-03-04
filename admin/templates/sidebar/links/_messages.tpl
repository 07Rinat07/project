<li class="control-panel__list-item">
	<a class="control-panel__list-link" href="<?=HOST?>admin/messages">
		<div class="control-panel__list-img-wrapper"><img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/mail.svg" alt="icon" />
			<?php if ( $messagesNewCounter > 0 ): ?>
				<div class="control-panel__list-img-badge"><?=$messagesNewCounter?>
				</div>
			<?php endif ?>
		</div>
		Сообщения
	</a>
</li>