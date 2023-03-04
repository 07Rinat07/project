<?php if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']) ): ?>
	<section id="comments-form" class="page-post__post-comments">
		<div class="page-post__title">
			<h2 class="heading">Оставить комментарий </h2>
		</div>
		<?php include ROOT . "templates/_components/_errors.tpl"; ?>
		<?php include ROOT . "templates/_components/_success.tpl"; ?> 
		<div class="page-post__comments-post-comment">
			<div class="post-comment">
				<div class="post-comment__avatar">
					<!-- <a href="#"> -->
						<div class="avatar-small">
							<img src="<?=HOST?>usercontent/avatars/<?php echo !empty($_SESSION['logged_user']['avatar_small']) ? $_SESSION['logged_user']['avatar_small'] : '_no-avatar.svg' ?>" alt="Аватарка" />
						</div>
					<!-- </a> -->
				</div>
				<form class="post-comment__form" action="<?=HOST?>add-comment" method="POST">
					<div class="post-comment__form-textarea">
						<textarea name="comment" class="textarea" placeholder="Введите ваш комментарий..."></textarea>
						<input type="hidden" name="post_id" value="<?=$post['id']?>">
					</div>
					<div class="post-comment__form-button">
						<button class="primary-button" name="submit" type="submit">Комментировать</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<?php endif; ?>