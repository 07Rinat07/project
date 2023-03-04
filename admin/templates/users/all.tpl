<div class="admin-page__content-form">

	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<div class="admin-form" style="width: 900px;">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Пользователи</h2>
			<a class="secondary-button" href="<?=HOST?>registration">Регистрация пользователя</a>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Имя</th>
					<th>Фамилия</th>	
					<th>email</th>				
					<th>Статус</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>	
				<tr>
					<td><?=$user->id?></td>
					<td>
						<a href="<?=HOST?>profile-edit/<?=$user->id?>">
							<?=$user->name?>
						</a>
					</td>
					<td>
						<a href="<?=HOST?>profile-edit/<?=$user->id?>">
							<?=$user->surname?>
						</a>
					</td>
					<td>
						<a href="<?=HOST?>profile-edit/<?=$user->id?>">
							<?=$user->email?>
						</a>
					</td>
					<td><?=$user->role?></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/user-delete?id=<?=$user->id?>"></a>
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
