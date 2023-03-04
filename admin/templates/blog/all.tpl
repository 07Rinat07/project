<div class="admin-page__content-form">
	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<div class="admin-form" style="width: 900px;">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Блог</h2>
			<a class="secondary-button" href="<?=HOST?>admin/post-new">Добавить пост</a>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th>Текст</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($posts as $post) : ?>	
				<tr>
					<td><?=$post->id?></td>
					<td><a href="<?=HOST?>admin/post-edit?id=<?=$post->id?>"><?=$post->title?></a></td>
					
					<td>
						<a href="<?=HOST?>admin/post-edit?id=<?=$post->id?>">
							<?php echo mb_strlen(strip_tags($post->content)) > 150 ? mb_substr(strip_tags($post->content), 0, 150) . '...' : strip_tags($post->content); 
							?>
						</a>
					</td>

					<td>
						<a class="icon-delete" href="<?=HOST?>admin/post-delete?id=<?=$post->id?>"></a>
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
