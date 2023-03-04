<?php if ( isset($comments) && count($comments) !== 0 ): ?>
	<section id="comments" class="page-post__comments">
		<div class="page-post__title">
			<h2 class="heading">Комментарии (<?php echo count($comments)?>)</h2>
		</div>				
		<?php foreach ($comments as $comment): ?>
			<div class="page-post__comments-comment">
				<div class="comment">
					<div class="comment__avatar">
						<a href="<?= HOST . 'profile/' . $comment['user'] ?>">
							<div class="avatar-small">
								<img src="<?php echo !empty($comment['avatar_small']) ? HOST . 'usercontent/avatars/' . $comment['avatar_small'] : HOST . 'usercontent/avatars/_no-avatar.svg' ?>" alt="Аватарка" />
							</div>
						</a>
					</div>
					<div class="comment__data">
						<div class="comment__user-info">
							<div class="comment__username">
								<a href="<?= HOST . 'profile/' . $comment['user'] ?>">
									<?php 
										if ( empty($comment['name']) && empty($comment['surname']) ) {
										 	echo 'Anonymous user';
										 } else {
										 	echo !empty($comment['name']) ? $comment['name'] . ' ' : '';
											echo !empty($comment['surname']) ? $comment['surname'] : '';
										 }
									?>
								</a>
							</div>
							<div class="comment__date"><img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" /><?=rus_date('j F Y года H:i', $comment['timestamp'])?></div>
							<div class="comment__date" style="margin-left: 10px;"><?php echo isset($comment['status']) && $comment['status'] === 'new' ? '(На проверке)' : null?>
							</div>
						</div>
						<div class="comment__text">
							<p><?=$comment['text']?></p>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</section>
<?php endif ?>			
