<div class="admin-page__content-form">
	<div class="admin-form" style="width: 900px">
		<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
		<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h1 class="heading">Панель управления</h1>
		</div>
		<div class="dashboard" style="margin-left: -15px;">
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/blog">Записей в блоге</a>
				</div>	
				<div class="dashboard-item__value"><?=$postsCount?></div>
				<div class="dashboard-item__action">
					<a href="<?=HOST?>admin/post-new" class="secondary-button">Добавить пост</a>	
				</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/categories">Категорий в блоге</a>
				</div>	
				<div class="dashboard-item__value"><?=$categoriesCount?></div>
				<div class="dashboard-item__action">
					<a href="<?=HOST?>admin/category-new" class="secondary-button">Добавить категорию</a>
				</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/comments">Комментариев</a>
				</div>	
				<div class="dashboard-item__value"><?=$commentsCount?> (<?=$commentsNewCounter?>)</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/shop">Проектов в портфолио</a>
				</div>	
				<div class="dashboard-item__value"><?=$projectsCount?></div>
				<div class="dashboard-item__action">
					<a href="<?=HOST?>admin/project-new" class="secondary-button">Добавить проект</a>	
				</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/shop">Товаров в магазине</a>
				</div>	
				<div class="dashboard-item__value"><?=$productsCount?></div>
				<div class="dashboard-item__action">
					<a href="<?=HOST?>admin/product-new" class="secondary-button">Добавить товар</a>	
				</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/orders">Заказов</a>
				</div>	
				<div class="dashboard-item__value"><?=$ordersCount?> (<?=$ordersNewCounter?>)</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/messages">Сообщений</a>
				</div>	
				<div class="dashboard-item__value"><?=$messagesTotalCount?> (<?=$messagesNewCounter?>)</div>
			</section>
			<section class="dashboard-item">
				<div class="dashboard-item__title">
					<a href="<?=HOST?>admin/users">Пользователей</a>
				</div>	
				<div class="dashboard-item__value"><?=$usersCount?></div>
			</section>
		</div>
	</div>
</div>