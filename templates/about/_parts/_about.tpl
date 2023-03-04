<div class="section-about">
	<div class="container">
		<div class="section-about__title">
			<h2 class="heading">Обо мне </h2>
		</div>
		<div class="row">
			<div class="section-about__avatar col">
				<div class="avatar-big"><img src="<?=HOST?>static/img/section-about-me/img-02.jpg" alt="Аватарка" /></div>
			</div>
			<div class="section-about__content col">
				<div class="post-about-me">
					<h4 class="post-about-me__title" > </h4>
					<p>Я начинающий вебпрограммист и занимаюсь разработкой современных сайтов и приложений. Мне нравится изучать новые технологии накапливая Hard skills и Soft skills.
						</p>
				</div>
				<div class="post-about-skills">
					<h3 class="post-about-skills"><?=$about['services_title']?></h3>
					<br>
					<ul class="skills__list">

						<?=$about['services_text']?>
					</ul>
					<br>
				</div>

			</div>

		</div>
		<div class="post-about-me">
			<p><?=$about['about_text']?> </p>
		</div>
	</div>

</div>
