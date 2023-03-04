<main class="page-portfolio">
	<div class="container">
		<div class="page-portfolio__header">
			<h2 class="heading">Портфолио<?php echo isset($_GET['tag']) && !empty($_GET['tag']) ? '. Проекты с тэгом "' . $_GET['tag'] . '"': null?></h2>
		</div>
		<div class="page-portfolio__cards">
			<?php foreach ($projects as $project) {
				include ROOT . 'templates/portfolio/_parts/_card.tpl';
			} ?>
		</div>
		<div class="page-portfolio__pagination">
			<?php include ROOT . "templates/_parts/_pagination.tpl" ?>
		</div>
	</div>
</main>