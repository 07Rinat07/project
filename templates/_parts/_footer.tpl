<footer class="section-footer">
	<div class="container">
		<div class="row">
			<div class="col section-footer__copyright">
				<p><?=$settings['copyright_name']?></p>
				<p><?=$settings['copyright_year']?></p>
			</div>
			<div class="col section-social-icons">
				<?php if ( isset($settings['youtube']) && !empty($settings['youtube']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['youtube']?>">
							<img src="<?=HOST?>static/img/favicons/youtube-brands.svg" alt="Youtube" width="30" height="21" />
						</a>
					</div>
				<?php endif ?>
				<?php if ( isset($settings['instagram']) && !empty($settings['instagram']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['instagram']?>">
							<img src="<?=HOST?>static/img/favicons/instagram.svg" alt="instagram" width="24" height="26" />
						</a>
					</div>
				<?php endif ?>
				<?php if ( isset($settings['facebook']) && !empty($settings['facebook']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['facebook']?>">
							<img src="<?=HOST?>static/img/favicons/facebook.svg" alt="facebook" width="18" height="28" />
						</a>
					</div>
				<?php endif ?>
				<?php if ( isset($settings['vkontakte']) && !empty($settings['vkontakte']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['vkontakte']?>">
							<img src="<?=HOST?>static/img/favicons/vk.svg" alt="vk" width="30" height="18" />
						</a>
					</div>
				<?php endif ?>
				<?php if ( isset($settings['linkedin']) && !empty($settings['linkedin']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['linkedin']?>">
							<img src="<?=HOST?>static/img/favicons/linkedin.svg" alt="linkedin" width="25" height="28" />
						</a>
					</div>
				<?php endif ?>
				<?php if ( isset($settings['github']) && !empty($settings['github']) ): ?>
					<div class="footer-icons">
						<a target="_blank" href="<?=$settings['github']?>">
							<img src="<?=HOST?>static/img/favicons/github-brands.svg" alt="github-brands" width="27" height="28" />
						</a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</footer>