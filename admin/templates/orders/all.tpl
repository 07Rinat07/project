<div class="admin-page__content-form">

	<?php require ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php require ROOT . "admin/templates/_components/_success.tpl"; ?> 

	<div class="admin-form" style="width: 900px;">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Заказы</h2>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Имя</th>
					<th>email</th>				
					<th>Статус</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order) : ?>	
				<tr <? echo $order['status'] == 'new' ? 'class="message-new"' : NULL?> >
					<td><?=$order['id']?></td>
					<td>
						<a href="<?=HOST?>admin/order?id=<?=$order['id']?>">
							<?=$order['name']?> <?=$order['surname']?>
						</a>
					</td>
					<td>
						<a href="<?=HOST?>admin/order?id=<?=$order['id']?>">
							<?=$order['email']?>
						</a>
					</td>
					<td><?=$order['status']?></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/order-delete?id=<?=$order['id']?>"></a>
					</td>
				</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
