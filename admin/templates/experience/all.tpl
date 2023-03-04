<div class="admin-page__content-form">

	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<div class="admin-form" style="width: 900px;">
		
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Опыт работы</h2>
			<a class="secondary-button" href="<?=HOST?>admin/workplace-new">Добавить запись</a>
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
				<?php foreach ($experience as $workplace) : ?>	
				<tr>
					<td><?=$workplace->id?></td>
					<td><a href="<?=HOST?>admin/workplace-edit?id=<?=$workplace->id?>"><?=$workplace->title?></a></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/workplace-delete?id=<?=$workplace->id?>"></a>
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
		
		<div class="admin-form__item pt-40">
			<?php //include ROOT . "admin/templates/_parts/_pagination.tpl" ?>
		</div>

	</div>
</div>
