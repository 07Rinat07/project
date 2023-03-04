<?php foreach ($comments as $comment): ?>
	<div class="comment">
		<div class="comment__avatar"><a href="#">
				<div class="avatar-small">
					<img src="<?=HOST?>usercontent/avatars/<?php echo !empty($user->avatar_small) ? $user->avatar_small : '_no-avatar.svg' ?>" alt="Аватарка" />
				</div>
			</a>
		</div>
		<div class="comment__data">
			<div class="comment__user-info">
				<div class="comment__username">
					<?php 
						if ( empty($user['name']) && empty($user['surname']) ) {
						 	echo 'Anonymous user';
						 } else {
						 	echo !empty($user['name']) ? $user['name'] . ' ' : '';
							echo !empty($user['surname']) ? $user['surname'] : '';
						 }
					?>
				</div>
				<div class="comment__date">
					<img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" />
					<?=rus_date('j F Y года H:i', $comment['timestamp'])?> 
					<a href="<?=HOST . 'blog/'. $comment['post'] . '#comments' ?>">
						к записи: <?= $comment['title'] ?>	
					</a>
				</div>
				<div class="comment__date" style="margin-left: 10px;"><?php echo isset($comment['status']) && $comment['status'] === 'new' ? '(На проверке)' : null?>
				</div>
			</div>
			<div class="comment__text">
				<p><?=$comment['text']?></p>
			</div>
		</div>
	</div>
<?php endforeach ?>