<div class="admin-page__content-form">
	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<div class="admin-form" style="width: 900px;">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Категории</h2>
			<a class="secondary-button" href="<?=HOST?>admin/category-new">Добавить категорию</a>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $category) : ?>	
				<tr>
					<td><?=$category->id?></td>
					<td><a href="<?=HOST?>admin/category-edit?id=<?=$category->id?>"><?=$category->title?></a></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/category-delete?id=<?=$category->id?>"></a>
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
		<div class="admin-form__item pt-40">
			<?php include ROOT . "templates/_parts/_pagination.tpl" ?>
		</div>
	</div>
</div>
