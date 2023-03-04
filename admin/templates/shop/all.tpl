<div class="admin-page__content-form">
	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<div class="admin-form" style="width: 900px;">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Каталог товаров</h2>
			<a class="secondary-button" href="<?=HOST?>admin/product-new">Добавить товар</a>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th>Цена</th>					
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product) : ?>	
				<tr>
					<td><?=$product->id?></td>
					<td><a href="<?=HOST?>admin/product-edit?id=<?=$product->id?>"><?=$product->title?></a></td>
					<td><?=$product->price?></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/product-delete?id=<?=$product->id?>"></a>
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
		<div class="admin-form__item pt-40">
			<?php include ROOT . "admin/templates/_parts/_pagination.tpl" ?>
		</div>
	</div>
</div>
