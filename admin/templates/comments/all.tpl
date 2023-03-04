<div class="admin-page__content-form">

	<?php include ROOT . "admin/templates/_components/_errors.tpl"; ?>
	<?php include ROOT . "admin/templates/_components/_success.tpl"; ?> 
	
	<div class="admin-form">
		<div class="admin-form__item d-flex justify-content-between mb-20">
			<h2 class="heading">Комментарии</h2>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Текст</th>
					<th>Время</th>					
					<th>Пост</th>
					<th>Пользователь</th>		
					<th></th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($comments as $comment) : ?>	
				<tr <? echo $comment['status'] == 'new' ? 'class="message-new"' : NULL?> >
					<td><?=$comment['id']?></td>
					<td>
						<a href="<?=HOST?>admin/comment?id=<?=$comment['id']?>">
							<?php echo mb_strlen($comment['text']) > 50 ? mb_substr($comment['text'], 0, 50) . '...' : $comment['text']; 
							?>
						</a>
					</td>
					<td><?=rus_date('d.m.Y H:i', $comment['timestamp'])?></td>		
					<td><a href="<?=HOST?>blog/<?=$comment['post']?>#comments"><?=$comment['post_title']?></a></td>
					<td><?=$comment['user_name']?> <?=$comment['user_surname']?></td>
					<td>
						<a class="icon-delete" href="<?=HOST?>admin/comments?action=delete&id=<?=$comment['id']?>"></a>
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
