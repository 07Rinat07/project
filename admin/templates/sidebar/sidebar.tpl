<div class="admin-page__left-panel">
	<div class="control-panel">
		<div class="control-panel__container">
			<a href="<?=HOST?>" class="control-panel__title-wrapper">
				<h2 class="control-panel__title">SiteMyPortfolio</h2>
				<p class="control-panel__subtitle" >панель управления</p>
			</a>
			
			<ul class="control-panel__list">
				<!-- class="control-panel__list-link--active" -->
				<?php include ROOT . 'admin/templates/sidebar/links/_main.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_blog.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_portfolio.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_shop.tpl' ?> 					
				<?php include ROOT . 'admin/templates/sidebar/links/_pages.tpl' ?> 
				<?php include ROOT . 'admin/templates/sidebar/links/_messages.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_comments.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_users.tpl' ?> 	
				<?php include ROOT . 'admin/templates/sidebar/links/_settings.tpl' ?> 	
			</ul>
		</div>
		<ul class="control-panel__list">
			<?php include ROOT . 'admin/templates/sidebar/links/_profile.tpl' ?> 	
			<?php include ROOT . 'admin/templates/sidebar/links/_exit.tpl' ?> 	
		</ul>
	</div>
</div>