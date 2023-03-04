<div class="admin-page__content-form">
	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	<div class="admin-form">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Сообщения</h2>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Отправитель</th>
					<th>Email</th>
					<th>Текст</th>
					<th>Время</th>					
					<th>Файл</th>
					<th></th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($messages as $message) : ?>	
				<tr <? echo $message->status == 'new' ? 'class="message-new"' : NULL?> >
					<td><?=$message->id?></td>
					<td><a href="<?=HOST?>admin/message?id=<?=$message->id?>"><?=$message->name?></a></td>
					<td><?=$message->email?></td>
					<td>
						<a href="<?=HOST?>admin/message?id=<?=$message->id?>">
							<?php echo mb_strlen($message->text) > 50 ? mb_substr($message->text, 0, 50) . '...' : $message->text; 
							?>
						</a>
					</td>
					<td><?=rus_date('d.m.Y H:i', $message->time)?></td>			
					<td>
					<?php if ( !empty($message->file_name_src) && !empty($message->file_name_original) ): ?>
						<a href="<?=HOST?>usercontent/contact-form/<?=$message->file_name_src?>" target="_blank">
							<img width="25" src="<?=HOST?>static/img/admin-panel/clip_icon.svg">
						</a>
					<?php endif ?>
					</td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/messages?action=delete&id=<?=$message->id?>"></a>
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
